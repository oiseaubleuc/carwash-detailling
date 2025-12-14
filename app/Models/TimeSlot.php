<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'time',
        'is_available',
        'max_bookings',
    ];

    protected $casts = [
        'date' => 'date',
        'time' => 'string',
        'is_available' => 'boolean',
        'max_bookings' => 'integer',
    ];

    /**
     * Get bookings count for this time slot
     */
    public function getBookingsCountAttribute()
    {
        return Booking::whereDate('booking_time', $this->date)
            ->where('time_slot', $this->time)
            ->count();
    }
}
