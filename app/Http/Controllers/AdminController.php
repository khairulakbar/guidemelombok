<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//use App\Destinations;
use App\Models\Destinations as Destinations;
use App\Models\Destination_details as Destination_details;
use App\Models\Access as Access;
use App\Models\Facilities as Facilities;
use App\Models\Webconfig as Webconfig;

use JWTAuth;

class AdminController extends Controller
{
    //

    public function webconf(){

        $results = Webconfig::all();
        return response()->json([
            'status' => true,
            'msg' => "Oke",
            'conf_list' => $results
        ]);

    }

    public function updatewebconf($id, Request $request){

        $conf = Webconfig::find($id);

        $conf->modal = $request->modal;
        $conf->modal_img = $request->modal_img;
        $conf->modal_url = $request->modal_url;

        $conf->save();

        return response()->json([
            'type' => 'success',
            'message' => 'Data Berhasil diupdate!',
        ]);

    }
    
    public function desty()
    {
        //return redirect('/admin/login');
        // mengambil data dari table destinations
        //$dest = DB::table('destinations')->get();
        
        //Eloquent get All Data

        //$user = JWTAuth::user();
        
        
        $dest = Destinations::all();
        
            // mengirim data destinations ke view index
        return view('index', ['destinations' => $dest]);
        
    }

    public function add()
    {

        return view('destination_add');
    }

    public function store(Request $request)
    {
        // insert data
        /*
        DB::table('destinations')->insert([
            'name_dest' => $request->name_dest,
        ]);
        */

        //eloquent
        $this->validate($request,[
    		'name_dest' => 'required',
    	]);
 
        Destinations::create([
    		'name_dest' => $request->name_dest,
    	]);

        // redirect page
        return redirect('/admin/destinasi');
    }

    public function edit($id)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
        //$dest = DB::table('destinations')->where('id', $id)->get();
        // passing data pegawai yang didapat ke view edit.blade.php

        //$dest = Destinations::find($id);
        $dest =  Destinations::join('destination_details', 'destinations.id', '=', 'destination_details.id_dest')
        ->join('access', 'destinations.id', '=', 'access.id_dest')
        ->join('facilities', 'destinations.id', '=', 'facilities.id_dest')
        ->where('destinations.id','=',$id)
        ->select(['destinations.*','destination_details.description','destination_details.address','destination_details.entrance_ticket',
                'access.car','access.motor','access.boat','access.walk',
                'facilities.toilet','facilities.parking','facilities.mosque','facilities.foodcourt'])
        ->first();

        return view('destination_edit', ['destinations' => $dest]);
    }

    public function update($id, Request $request)
    {
        // update data
        /*
        DB::table('destinations')->where('id', $request->id)->update([
            'name_dest' => $request->name_dest,
        ]);
        */

        $this->validate($request,[
    		'name_dest' => 'required',
    	]);

        $dest = Destinations::find($id);
        $dest2 = Destination_details::find($id);
        $dest3 = Access::find($id);
        $dest4 = Facilities::find($id);

        $dest->name_dest = $request->name_dest;
        $dest->slug = $request->slug;
        $dest->latitude = $request->latitude;
        $dest->longitude = $request->longitude;
        $dest->thumb_img = $request->thumb_img;

        $dest2->description = $request->description;
        $dest2->address = $request->address;
        $dest2->entrance_ticket = $request->entrance_ticket;

        $dest3->car = $request->car;
        $dest3->motor = $request->motor;
        $dest3->boat = $request->boat;
        $dest3->walk = $request->walk;

        $dest4->toilet = $request->toilet;
        $dest4->parking = $request->parking;
        $dest4->mosque = $request->mosque;
        $dest4->foodcourt = $request->foodcourt;
        
        
        
        $dest->save();
        $dest2->save();
        $dest3->save();
        $dest4->save();
 

        // alihkan halaman ke halaman list
        return redirect('/admin/destinasi');
    }

    public function hapus($id)
    {
        // menghapus data berdasarkan id yang dipilih
        //DB::table('destinations')->where('id', $id)->delete();

        $dest = Destinations::find($id);
        $dest->delete();

        return redirect()->back();
    }
}
