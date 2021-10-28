<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destinations;

class DestinationController extends Controller
{
    public function index()
    {

        //$results = Destinations::orderBy('id', 'DESC')->get(['id', 'name_dest', 'latitude', 'longitude']);

        $results = Destinations::leftjoin('destination_details', 'destinations.id', '=', 'destination_details.id_dest')->get(['destinations.*','destination_details.description','destination_details.address','destination_details.entrance_ticket']);


        return response()->json($results);
    }

    public function dest_search($name){

        $results = Destinations::leftjoin('destination_details', 'destinations.id', '=', 'destination_details.id_dest')
                    ->where('name_dest','LIKE',"%{$name}%")
                    ->get(['destinations.*','destination_details.description','destination_details.address','destination_details.entrance_ticket']);

        return response()->json($results);

    }
}
