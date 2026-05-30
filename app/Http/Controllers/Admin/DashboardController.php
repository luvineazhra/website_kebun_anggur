<?php

namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Service;
use App\Models\TrainingRegistration;
use App\Models\OrderItem;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'totalProducts' => Product::count(),

            'totalOrders' => 
                Order::count() + 
                Service::count() + 
                TrainingRegistration::count(), 

            'totalRevenue' => 
                Order::where('status', 'confirmed')->sum('total_amount') + 
                Service::whereIn('status', ['confirmed', 'completed'])->sum('total_price') + 
                TrainingRegistration::where('status', 'confirmed')->sum('total_price'),

            'totalCustomers' => 
                User::where('role', 'customer')->count(),
        ];



        // =========================================
        // WEEKLY REVENUE
        // =========================================
        $weeklyRevenue = Order::selectRaw('DATE(created_at) as label, SUM(total_amount) as total')
            ->where('status', 'confirmed')
            ->groupBy('label')
            ->orderBy('label', 'ASC')
            ->take(7)
            ->get();



        // =========================================
        // MONTHLY REVENUE
        // =========================================
        $monthlyRevenue = Order::selectRaw('MONTHNAME(created_at) as label, SUM(total_amount) as total')
            ->where('status', 'confirmed')
            ->groupBy('label')
            ->get();



        // =========================================
        // YEARLY REVENUE
        // =========================================
        $yearlyRevenue = Order::selectRaw('YEAR(created_at) as label, SUM(total_amount) as total')
            ->where('status', 'confirmed')
            ->groupBy('label')
            ->get();



        // =========================================
        // BEST SELLER CATEGORY
        // =========================================
        $bestCategoryProducts = DB::table('order_items')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select(
                'categories.name as category_name',
                DB::raw('SUM(order_items.quantity) as total_sold')
            )
            ->groupBy('categories.name')
            ->orderByDesc('total_sold')
            ->get();



        // =========================================
        // TOP PRODUCTS
        // =========================================
        $topProducts = OrderItem::select(
                'product_id',
                DB::raw('SUM(quantity) as total_sold')
            )
            ->groupBy('product_id')
            ->orderByDesc('total_sold')
            ->take(5)
            ->get()
            ->map(function ($item) {

                $product = Product::find($item->product_id);

                $item->product_name = $product
                    ? $product->name
                    : 'Unknown';

                return $item;
            });



        // =========================================
        // RECENT ORDERS
        // =========================================
        $recentOrders = Order::with('user')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();



        // =========================================
        // RECENT SERVICES
        // =========================================
        $recentServices = Service::with('user')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();



        // =========================================
        // RECENT TRAINING REGISTRATIONS
        // =========================================
        $recentRegistrations = TrainingRegistration::with([
                'training',
                'user'
            ])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();



        // =========================================
        // PENDING PAYMENTS
        // =========================================
        $pendingPayments = collect();



        $orderPending = Order::where('status', 'paid')
            ->with('user')
            ->get()
            ->map(function($item) {

                $item->type = 'Produk';

                $item->route = route(
                    'admin.pesanan.show',
                    $item->id
                );

                return $item;
            });



        $servicePending = Service::where('status', 'pending')
            ->whereNotNull('payment_proof')
            ->with('user')
            ->get()
            ->map(function($item) {

                $item->type = 'Layanan';

                $item->route = route(
                    'admin.layanan.show',
                    $item->id
                );

                return $item;
            });



        $trainingPending = TrainingRegistration::where('status', 'pending')
            ->whereNotNull('payment_proof')
            ->with([
                'user',
                'training'
            ])
            ->get()
            ->map(function($item) {

                $item->type = 'Pelatihan';

                $item->route = route(
                    'admin.pelatihan.registrations',
                    $item->training_id
                );

                return $item;
            });



        $pendingPayments = $orderPending
            ->concat($servicePending)
            ->concat($trainingPending)
            ->sortByDesc('created_at')
            ->take(10);



        return view('admin.dashboard', compact(
            'stats',
            'weeklyRevenue',
            'monthlyRevenue',
            'yearlyRevenue',
            'bestCategoryProducts',
            'topProducts',
            'recentOrders',
            'recentServices',
            'recentRegistrations',
            'pendingPayments'
        ));
    }
}