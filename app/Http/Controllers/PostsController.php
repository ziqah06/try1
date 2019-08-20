<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; //use namaFolder\namaFile;
use DB; // select posts by db

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DB::select('SELECT title FROM posts');
        //return view('namaFolder.namaFile');
        //return view('posts.index');
        //return Post::all(); tuk json file, display data without design
        /*$posts = Post::all(); //tuk extract smua record dri db & kena letak import model //utk display smua view
        return view('posts.index')->with('posts', $posts);*/
        //$posts = Post::orderBy('title','desc')->paginate(1); //utk pagination view
        //$posts = Post::orderBy('title','asc')->paginate(2);
        //Post::orderBy('table apa yg nak','asc @desc')->paginate(display berapa byak);
        //return Post::where('title','testing')->get();
        return view('posts.index')->with('posts', $posts);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //find(utk cri id), id adalah parameter atas
        $post = Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
