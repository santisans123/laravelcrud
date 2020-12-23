<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::latest()->paginate(10);

        return view('message.index-message',compact('messages'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.view');
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
            'name' => 'required',
            'email' => 'required',
            'nrp' => 'required',
            'message' => 'required',
        ]);

        Message::create($request->all());

        return view('welcome')
                        ->with('success','Post created successfully.');
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
        return view('welcome',compact('messages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('welcome',compact('messages')); //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'nrp' => 'required',
            'message' => 'required',
        ]);

        $message->update($request->all());

        return redirect()->route('welcome')
                        ->with('success','Post updated successfully');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()->route('message.index-message')
            ->with('success','Post deleted successfully');
        //
    }
    public function caripesan(Request $request){
        $cari = $request->cari;

        $messages = Message ::latest()
    ->where('name','like',"%".$cari."%")->paginate(5);

    return view('message.index-message',['messages' => $messages])
    ->with('i', (request()->input('page', 1) - 1) * 5);

    }
}
