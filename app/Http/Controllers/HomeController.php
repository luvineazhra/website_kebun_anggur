<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Article;
use App\Models\Testimonial;
use App\Models\Training;
use App\Models\Service;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $featuredProducts = Product::where('is_featured', true)
            ->where('stock', '>', 0)
            ->take(6)
            ->get();

        $recentArticles = Article::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        $approvedTestimonials = Testimonial::where('is_approved', true)
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        $activeTrainings = Training::where('is_active', true)
            ->where('schedule_date', '>=', now()->toDateString())
            ->orderBy('schedule_date', 'asc')
            ->take(3)
            ->get();

        return view('home', compact(
            'featuredProducts',
            'recentArticles',
            'approvedTestimonials',
            'activeTrainings'
        ));
    }
}