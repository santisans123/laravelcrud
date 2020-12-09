<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class PostController extends Controller
{
    protected $posts = 'App\Http\Controllers';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        $posts = Post ::latest()->paginate(5);
        return view('posts.index',compact('posts'),)
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        $posts = Post ::latest()->paginate(5);
        return view('posts.view',compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $file = Request()->foto('foto');
        $fileName = Request()->title.'.'.$file->extension();
        $file->move(public_path('gambar'), $fileName);

        $data = [
            'title' => Request()->title,
            'kategori' => Request()->kategori,
            'content' => Request()->content,
            'ket' => Request()->ket,
            'foto' => Request()->foto,
        ];
        $this->Post->addData($data);
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
            'foto' => 'required',
        ]);

        Post::create($request->all());

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
        $post=Post::findOrFail($id);
        return view('posts.edit',['post'=> $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'kategori' => 'required',
            'content' => 'required',
            'ket' => 'required',
            'foto' => 'required',
        ]);

        $post->update($request->all());

        return redirect()->route('posts.index')
                        ->with('success','Post updated successfully');
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
        $posts = Post::where('title',$cari)->get();
        return view('posts.index',compact('posts'));
}
}
