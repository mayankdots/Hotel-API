<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HotelReview;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'supplier', 'status', 'created_at', 'updated_at'];

    public function reviews()
    {
        return $this->hasMany(HotelReview::class, "hotel_id");
    }

    public function getRatingAttribute()
    {
        $rating = (float) $this->reviews()->avg('rating');
        return round($rating, 1);
    }

    /**
     * Fetch hotel data with hotel reviews.
     * 
     * @param  \App\Models\Hotel $hotel_id
     * @return \App\Models\Hotel hotel_data
     */
    public function hotelDetail($hotel_id) {
        try {
            $hotel_data = Hotel::with(["reviews"=> function($query) {
                                    $query->select("id", "hotel_id", "title", "description", "author", "rating");
                                }])
                                ->select("id", "name")
                                ->where([
                                            "id"=> $hotel_id,
                                            "status"=> 1
                                        ])
                                ->first();
            if (empty($hotel_data)) {
                throw new \Exception("Hotel detail failed to fetch."); 
            }
            return $hotel_data;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    protected $appends = ["rating"];
}
