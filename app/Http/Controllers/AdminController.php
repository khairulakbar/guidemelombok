<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//use App\Destinations;
use App\Models\Destinations as Destinations;

class AdminController extends Controller
{
    //

    public function index()
    {
        // mengambil data dari table destinations
        //$dest = DB::table('destinations')->get();

        //Eloquent get All Data
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

        $dest = Destinations::find($id);

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

        $dest->name_dest = $request->name_dest;
        $dest->save();
 

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
