<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\TrainingRegistration;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrainingController extends Controller
{
    public function index(): View
    {
        $trainings = Training::where('is_active', true)
            ->where('schedule_date', '>=', now()->toDateString())
            ->orderBy('schedule_date', 'asc')
            ->paginate(9);

        return view('trainings.index', compact('trainings'));
    }

    public function show($id): View
    {
        $training = Training::findOrFail($id);
        return view('trainings.show', compact('training'));
    }

    public function register(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'participant_count' => 'required|integer|min:1|max:10',
            'payment_method' => 'required|in:Transfer BCA,Transfer BRI,Transfer Mandiri',
        ]);

        $training = Training::findOrFail($id);
        $totalPrice = $request->participant_count * $training->price_per_person;
        $orderNumber = 'TRN-' . date('Ymd') . '-' . strtoupper(\Illuminate\Support\Str::random(4));

        $bankCodes = [
            'Transfer BCA' => '8888',
            'Transfer BRI' => '7777',
            'Transfer Mandiri' => '9999',
        ];
        $bankCode = $bankCodes[$request->payment_method] ?? '0000';
        $virtualAccount = $bankCode . rand(1000000000, 9999999999);

        $registration = TrainingRegistration::create([
            'training_id' => $id,
            'user_id' => Auth::id(),
            'order_number' => $orderNumber,
            'name' => $request->name,
            'phone' => $request->phone,
            'participant_count' => $request->participant_count,
            'total_price' => $totalPrice,
            'payment_method' => $request->payment_method,
            'virtual_account' => $virtualAccount,
            'status' => 'pending',
        ]);

        return redirect()->route('payment.show', $registration->order_number)
            ->with('success', 'Pendaftaran berhasil! Silakan lakukan pembayaran.');
    }
}