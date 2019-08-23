<?php

namespace App\Http\Controllers; //tuk bezakan nama file yg sama, kalau ada folder yg berlainan

use Illuminate\Http\Request;
use App\Post; //use namaFolder\namaFile;
use DB; // select posts by db
use Illuminate\Support\Facades\Storage;  //import gmbar dri public storage

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return DB::select('SELECT title FROM posts');
        //return view('namaFolder.namaFile');
        //return view('posts.index');
        //return Post::all(); tuk json file, display data without design
        /*$posts = Post::all(); //tuk extract smua record dri db & kena letak import model //utk display smua view
        return view('posts.index')->with('posts', $posts);*/
        
        //$posts = Post::orderBy('title','desc')->paginate(1); //utk pagination view
        //$posts = Post::orderBy('title','asc')->paginate(2);
        //Post::orderBy('table apa yg nak','asc @desc')->paginate(display berapa byak);
        //return Post::where('title','testing')->get();
        //return view('posts.index')->with('posts', $posts);

        $posts = Post::orderBy('created_at','desc')->paginate(5);
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

    public function search()
    {
        //
        return view('posts.search');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate error message if textbox null
        $this->validate($request, [
            'title'=>'required',
            'body'=>'required',
            'cover_image'=>'image|nullable|max:1999'
            ]);

            if($request->hasFile('cover_image')){ //*utk tgok ada file ke x
                $filenameWithExt = $request->file('cover_image')->getClientOriginalName();  //amek smua nama eg: my_pic.jpg
                $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);                   //amek smua nama eg: my_pic.jpg
                $extension = $request->file('cover_image')->getClientOriginalExtension();   //amek extension je eg:jpg
                $filenameToStore = $filename.'_'.time().'.'.$extension;                     //amek nama filename_time.extens eg:my_pic_114140.jpg
                $path = $request->file('cover_image')->storeAs('public/cover_images', $filenameToStore);
            } else{
                $filenameToStore = 'no_image.jpg';
            }
           
            $post = new Post();
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->user_id = auth()->user()->id;
            $post->cover_image = $filenameToStore;
            $post->save();
           
            return redirect('/posts')->with('success', 'Post Successfully Created!!!'); 
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
        //to post edit data
        $post = Post::find($id);
        if(auth()->user()->id !== $post->user_id)
        {
            return redirect('/posts')->with('error','Unauthorized Page!!!');
        }
        return view('posts.edit')->with('post',$post);
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
        //after edit then go to update *to update data
        $this->validate($request, [
            'title'=>'required',
            'body'=>'required'
            ]);
           
            if($request->hasFile('cover_image')){
                $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('cover_image')->getClientOriginalExtension();
                $filenameToStore =$filename.'_'.time().'.'.$extension;
                $path = $request->file('cover_image')->storeAs('public/cover_images', $filenameToStore);
            }

            $post = Post::find($id);
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            if($request->hasFile('cover_image'))
            {
                $post->cover_image = $filenameToStore;
            }
            $post->save();
           
            return redirect('/posts')->with('success', 'Post Successfully Updated!!!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //utk delete row, select by id
        $post = Post::find($id);
        if(auth()->user()->id !== $post->user_id)
        {
            return redirect('/posts')->with('error','Unauthorized Page!!!');
        }

        if($post->cover_image != 'no_image.jpg'){
            Storage::delete('public/cover_images/'.$post->cover_image);
        }

        $post->delete();
        return redirect('/posts')->with('success', 'Post Successfully Deleted!!!');
    }

    public function __construct() /*tuk allow guest access index n show page*/
    {
        $this->middleware('auth',['except' => ['index','show']]);
    }
}
