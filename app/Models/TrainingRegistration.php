<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'training_id',
        'user_id',
        'order_number',
        'name',
        'phone',
        'participant_count',
        'total_price',
        'payment_method',
        'virtual_account',
        'payment_proof',
        'status',
    ];

    protected $casts = [
        'total_price' => 'decimal:2',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($registration) {
            if (empty($registration->total_price)) {
                $training = Training::find($registration->training_id);
                $price = $training ? $training->price_per_person : 250000;
                $registration->total_price = $registration->participant_count * $price;
            }
            if (empty($registration->order_number)) {
                $registration->order_number = 'TRN-' . date('Ymd') . '-' . strtoupper(\Illuminate\Support\Str::random(4));
            }
        });
    }

    public function training()
    {
        return $this->belongsTo(Training::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFormattedTotalAttribute()
    {
        return 'Rp ' . number_format($this->total_price, 0, ',', '.');
    }

    public function getStatusBadgeAttribute()
    {
        $badges = [
            'pending' => 'bg-yellow-100 text-yellow-800',
            'confirmed' => 'bg-green-100 text-green-800',
            'cancelled' => 'bg-red-100 text-red-800',
        ];
        return $badges[$this->status] ?? 'bg-gray-100 text-gray-800';
    }
}