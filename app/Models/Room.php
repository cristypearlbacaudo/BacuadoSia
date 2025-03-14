<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';

    protected $fillable = [
        'image',
        'room_num',
        'type',
        'room_desc',
        'price',
    ];

    public function bookings() {
        return $this->hasMany(Booking::class);
    }

   public function payment() {
       return $this->belongsTo(Payment::class);
   }
}
