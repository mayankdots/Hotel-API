<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelReview extends Model
{
    use HasFactory;

    protected $fillable = ['hotel_id', 'title', 'description', 'author', 'created_at', 'updated_at'];
}
