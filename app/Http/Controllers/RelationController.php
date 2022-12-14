<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\ArticleAuthor;
use App\Models\Author;
use DB;

class RelationController extends Controller
{

    public function index(){
       //dd("hellow");
       return view('relation');
    }
   
    public function onetoOne(){

    	//dd(Category::find(1)->oneArticle);
        //dd(Article::find()->getCategory;
    	$data['onetoOne'] = Category::find(1)->oneArticle;
    	$data['onetmany'] = Category::find(1)->manyArticle;
    	$data['manytomany1'] = Article::find(1)->getAuthor;
    	$data['manytomany2'] = Author::find(1)->Articles;
      return view('relations', $data);
    }

    // public function onetomany(){

    // 	//dd(Category::find(1)->manyArticle);
    //    // dd(Article::find()->getCategory;

    //   return view('relation');
    // }

    // public function manytomany(){

    //    //  dd(Article::find(2)->getAuthor);
    //    // dd(Author::find(1)->Articles);
    //   return view('relation');
    // }
}
