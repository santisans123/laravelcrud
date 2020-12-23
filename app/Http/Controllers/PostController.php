<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    protected $posts = 'App\Http\Controllers';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view() {

        $posts = Post ::latest()->paginate(5);
        return view('posts.view',compact('posts'),)
            ->with('i',(request()->input('page', 1) - 1) * 5);
    }

    public function index(Post $post)
    {
        $posts = Post ::latest()->paginate(5);
        return view('posts.index',compact('posts'),)
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return redirect()->route('posts.index')
                        ->with('success','Post created successfully.');
        return view('admin.acara.tambah');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'kategori' => 'required',
            'content' => 'required',
            'ket' => 'required',
            'foto' => 'required|file',
        ]);

        $foto = $request->file('foto');

    	$nama_file = time()."_".$foto->getClientOriginalName();
    	$tujuan = 'uploads';
    	$foto->move($tujuan, $nama_file);

        Post::create([
            'foto' => $nama_file,
    		'title' => $request->title,
    		'kategori' => $request->kategori,
    		'content' => $request->content,
    		'ket' => $request->ket,
        ]);
        return redirect()->route('posts.index')
                        ->with('success','Post created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        return view('posts.edit',['post'=> $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $request->validate([
            'title' => 'required',
            'kategori' => 'required',
            'content' => 'required',
            'ket' => 'required',
        ]);

        $foto = $request->file('foto');

        if ($foto != null) {
        	$nama_file = time()."_".$foto->getClientOriginalName();
        	$tujuan = 'uploads';
        	$foto->move($tujuan, $nama_file);
        }

    	if ($request->publish != null) {
    		$status = "published";
    	} else {
    		$status = "drafted";
    	}

    	$post = Post::find($id);
    	$post->title = $request->title;
    	$post->kategori = $request->kategori;
    	$post->content = $request->content;
    	$post->ket = $request->ket;
        if($foto != null)
    	   $post->foto = $nama_file;
    	$post->save();
        $post->update($request->all());
       return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
                        ->with('success','Post deleted successfully');

    }

        public function cari(Request $request){
            $cari = $request->cari;

            $posts = Post ::latest()
		->where('title','like',"%".$cari."%")->paginate(5);

		return view('posts.cari',['posts' => $posts])
        ->with('i', (request()->input('page', 1) - 1) * 5);

        }
        public function cariuser(Request $request){
            $cari = $request->cari;

            $posts = Post ::latest()
		->where('title','like',"%".$cari."%")->paginate(5);

		return view('posts.view',['posts' => $posts])
        ->with('i', (request()->input('page', 1) - 1) * 5);

        }
}
