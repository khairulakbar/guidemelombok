<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destinations;
use App\Models\Articles;

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
            ->where('articles.article-slug', '=', "$slug")
            ->get(['articles.*', 'article_categories.category']);

        return response()->json([
            'status' => true,
            'msg' => "Oke",
            'article_list' => $results
        ]);
    }
}
