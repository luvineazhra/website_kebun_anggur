<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'schedule_date',
        'price_per_person',
        'bonus_info',
        'max_participants',
        'image',
        'is_active',
    ];

    protected $casts = [
        'price_per_person' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function registrations()
    {
        return $this->hasMany(TrainingRegistration::class);
    }

    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price_per_person, 0, ',', '.');
    }

    public function getAvailableSlotsAttribute()
    {
        $registered = $this->registrations()->where('status', '!=', 'cancelled')->sum('participant_count');
        return $this->max_participants - $registered;
    }
}