<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_booking';

    protected $hidden = [
        'updated_at',
        'created_at'
        ];

//    protected $fillable = [
//        'id',
//        'id_restaurant',
//        'id_user',
//        'booking_date',
//        'from_hour',
//        'to_hour',
//        'table_number',
//        'number_people'
//    ];
}
