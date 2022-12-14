<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Article;

class ArticleController extends Controller
{
    
    public function index()
    {
        $data['category'] = DB::table('categories')->get();
        $data['authors'] = DB::table('authors')->get(); 
       //dd($data);
       return view('joins.article',$data) ; 
    }

    
    public function create()
    {
        dd('hhhhhhhhhhh');
        return view('joins.article') ; 
    }

    
    public function store(Request $request)
    {
        dd($request);
        return view('joins.articleshow');
    }

    
    public function show($id)
    {
        $data['articles'] = DB::table('articles')
                    ->join('authors','authors.id' , '=', 'articles.author_id')
                    ->join('categories','categories.id' , '=', 'articles.category_id')
                    ->select('articles.*', 'authors.name as author', 'categories.name as category')
                    ->get();
                   // dd($data);

                    /*left join*/
                    $data['leftdata'] = DB::table('articles')
                    ->leftJoin('authors','authors.id' , '=', 'articles.author_id')
                    ->leftJoin('categories','categories.id' , '=', 'articles.category_id')
                    ->select('articles.*', 'authors.name as author', 'categories.name as category')
                    ->get();
                   //dd($data);

                    /*rigt join*/
                    $data['rightdata'] = DB::table('articles')
                    ->rightJoin('authors','authors.id' , '=', 'articles.author_id')
                    //->rightJoin('categories','categories.id' , '=', 'articles.category_id')
                    ->select('articles.*', 'authors.name as author')
                    ->get();
                   //dd($data);

                    /*cross join*/
                    $data['crossdata'] = DB::table('articles')
                    ->crossJoin('authors','authors.id' , '=', 'articles.author_id')
                    //->crossJoin('categories','categories.id' , '=', 'articles.category_id')
                    ->select('articles.*', 'authors.name as author')
                    ->get();
                   // dd($data);
        return view('joins.articleshow',$data);
        }

   
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
