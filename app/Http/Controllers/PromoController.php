<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promos;

use Illuminate\Support\Str;


class PromoController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function index()
    {
        
    }


    public function promo_list()
    {

        $results = Promos::leftjoin('promo_categories', 'promos.promocategory_id', '=', 'promo_categories.id')
            ->orderBy('promos.id', 'DESC')
            ->get(['promos.*', 'promo_categories.category']);

        return response()->json([
            'status' => true,
            'msg' => "Oke",
            'promo_list' => $results
        ]);
    }

    public function detailPromo($slug)
    {

        $results = Promos::leftjoin('promo_categories', 'promos.promocategory_id', '=', 'promo_categories.id')
            ->where('promos.promo_slug', '=', "$slug")
            ->get(['promos.*', 'promo_categories.category']);

        return response()->json([
            'status' => true,
            'msg' => "Oke",
            'promo_list' => $results
        ]);
    }

    public function addPromo(Request $request){

        $this->validate($request, [
            'promo' => 'required',
        ]);
        

        $promo = $request->promo;
        $promo_slug = Str::slug($request->promo);
        $promo_detail = $request->input('promo_detail');
        $promocategory_id = $request->input('promocategory_id');
        $promo_img = $request->input('promo_img');
        $source = $request->input('source');

        Promos::create([
            'promo' => $promo,
            'promo_slug' => $promo_slug,
            'promo_detail' => $promo_detail,
            'promocategory_id' => $promocategory_id,
            'promo_img' => $promo_img,
            'source' => $source
        ]);

        return response()->json([
            'type' => 'success',
            'message' => 'Data Berhasil ditambahkan!',
            //'listdata' => $data
        ]);

    }

    public function updatePromo($id, Request $request){

        $this->validate($request, [
            'promo' => 'required',
        ]);
        
        $promos = Promos::find($id);


        $promos->promo = $request->promo;
        $promos->promo_slug = Str::slug($request->promo);
        $promos->promo_detail = $request->promo_detail;
        $promos->promocategory_id = $request->promocategory_id;
        $promos->promo_img = $request->promo_img;
        $promos->source = $request->source;

        $promos->save();
        

        return response()->json([
            'type' => 'success',
            'message' => 'Data Berhasil diupdate!',
            //'listdata' => $data
        ]);

    }

    public function deletePromo($id)
    {
        $promos = Promos::find($id);
        $promos->delete();

        return response()->json([
            'type' => 'success',
            'message' => 'Data Berhasil dihapus!',
            //'listdata' => $data
        ]);
    }

}
