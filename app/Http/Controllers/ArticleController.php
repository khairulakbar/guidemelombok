<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destinations;
use App\Models\Articles;

use Illuminate\Support\Str;


class ArticleController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function index()
    {
        
    }

    //ARTICLES

    public function latest_article()
    {

        $results = Articles::leftjoin('article_categories', 'articles.category_id', '=', 'article_categories.id')
            ->orderBy('articles.id', 'DESC')
            ->limit(4)
            ->get(['articles.*', 'article_categories.category']);

        return response()->json([
            'status' => true,
            'msg' => "Oke",
            'article_list' => $results
        ]);
    }

    public function article_list()
    {

        $results = Articles::leftjoin('article_categories', 'articles.category_id', '=', 'article_categories.id')
            ->orderBy('articles.id', 'DESC')
            ->get(['articles.*', 'article_categories.category']);

        return response()->json([
            'status' => true,
            'msg' => "Oke",
            'article_list' => $results
        ]);
    }

    public function full_article($slug)
    {

        $results = Articles::leftjoin('article_categories', 'articles.category_id', '=', 'article_categories.id')
            ->where('articles.article_slug', '=', "$slug")
            ->get(['articles.*', 'article_categories.category']);

        return response()->json([
            'status' => true,
            'msg' => "Oke",
            'article_list' => $results
        ]);
    }

    public function addArticle(Request $request){

        $this->validate($request, [
            'title' => 'required',
        ]);
        

        $title = $request->title;
        $article_slug = Str::slug($request->title);
        $article = $request->input('article');
        $category_id = $request->input('category_id');
        $article_img = $request->input('article_img');
        $source = $request->input('source');

        Articles::create([
            'title' => $title,
            'article_slug' => $article_slug,
            'article' => $article,
            'category_id' => $category_id,
            'article_img' => $article_img,
            'source' => $source
        ]);

        return response()->json([
            'type' => 'success',
            'message' => 'Data Berhasil ditambahkan!',
            //'listdata' => $data
        ]);

    }

    public function updateArticle($id, Request $request){

        $this->validate($request, [
            'title' => 'required',
        ]);
        
        $artikel = Articles::find($id);


        $artikel->title = $request->title;
        $artikel->article_slug = Str::slug($request->title);
        $artikel->article = $request->article;
        $artikel->category_id = $request->category_id;
        $artikel->article_img = $request->article_img;
        $artikel->source = $request->source;

        $artikel->save();
        

        return response()->json([
            'type' => 'success',
            'message' => 'Data Berhasil diupdate!',
            //'listdata' => $data
        ]);

    }

    public function deleteArticle($id)
    {
        $artikel = Articles::find($id);
        $artikel->delete();

        return response()->json([
            'type' => 'success',
            'message' => 'Data Berhasil dihapus!',
            //'listdata' => $data
        ]);
    }

}
