<?php
namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hotel;

class HotelController extends Controller
{

    /**
     * Detail of specific hotel by hotel id with hotel review records.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotel  $hotel_id
     * @return \Illuminate\Http\Response
     */
    public function detail(Request $request, $hotel_id)
    {
        try {
            $this->apiArray['state'] = 'hotel detail';
            
            $hotel_data = (new Hotel())->hotelDetail($hotel_id);

            $this->apiArray['status'] = true;
            $this->apiArray['message'] = "Hotel detail fetch successfully.";
            $this->apiArray['data'] = $hotel_data;

        } catch (\Exception $e) {
            $this->apiArray['message'] = $e->getMessage();
        }
        
        return response()->json($this->apiArray);
    }
}