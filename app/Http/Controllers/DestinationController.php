<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destinations;

class DestinationController extends Controller
{
    public function index($koordinat)
    {
        $split = explode(",",$koordinat);

        $lat = $split[0];
        $lng = $split[1];

        //$results = Destinations::orderBy('id', 'DESC')->get(['id', 'name_dest', 'latitude', 'longitude']);
        /*
        $results = Destinations::leftjoin('destination_details', 'destinations.id', '=', 'destination_details.id_dest')
                ->get(['destinations.name_dest',
                        'destinations.latitude',
                        'destinations.longitude',
                        'destinations.thumb_img',
                        'destination_details.description',
                        'destination_details.address',
                        'destination_details.entrance_ticket']);
        */

        $results = Destinations::leftjoin('destination_details', 'destinations.id', '=', 'destination_details.id_dest')
        ->select(Destinations::raw('name_dest,latitude,longitude,description,address,entrance_ticket,
        (6371 * ACOS(SIN(RADIANS(latitude)) * SIN(RADIANS('."$lat".')) + COS(RADIANS(longitude - '."$lng".')) * COS(RADIANS(latitude)) * COS(RADIANS('."$lat".')))) AS jarak')
        )
        ->havingRaw('jarak < 6371')
        ->orderBy('jarak', 'ASC')
        ->get();
        return response()->json([
            'status' => true,
            'msg' => "Oke",
            'dest_list' => $results
        ]);
    }

    public function alldestination($koordinat)
    {
        $split = explode(",",$koordinat);

        $lat = $split[0];
        $lng = $split[1];

        $results = Destinations::leftjoin('destination_details', 'destinations.id', '=', 'destination_details.id_dest')
        ->select(Destinations::raw('name_dest,latitude,longitude,description,address,entrance_ticket,
        (6371 * ACOS(SIN(RADIANS(latitude)) * SIN(RADIANS('."$lat".')) + COS(RADIANS(longitude - '."$lng".')) * COS(RADIANS(latitude)) * COS(RADIANS('."$lat".')))) AS jarak')
        )
        ->orderBy('jarak', 'ASC')
        ->get();
        return response()->json([
            'status' => true,
            'msg' => "Oke",
            'dest_list' => $results
        ]);
    }

    public function dest_search($name){

        $results = Destinations::leftjoin('destination_details', 'destinations.id', '=', 'destination_details.id_dest')
                    ->where('name_dest','LIKE',"%{$name}%")
                    ->get(['destinations.*','destination_details.description','destination_details.address','destination_details.entrance_ticket']);

        return response()->json($results);

    }
}
