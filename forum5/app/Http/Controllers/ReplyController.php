<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Thread;

use Illuminate\Http\Request;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param $channelId
     * @param Thread $thread
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($channelId,Thread $thread)
    {
        //
        $this->validate(request(),[
            'body'=>'required'

        ]);
        $thread->addReply([
            'body'=>request('body'),
            'user_id'=>auth()->id()

        ]);

        return back()->with('flash', ' Your reply has been successfully updated ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function show(Reply $reply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function edit(Reply $reply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(request $request, Reply $reply)
    {
        //
        $this->authorize('update',$reply);
        $reply=Reply::find($request->id);
        $reply->body=$request->body;
        $reply->save();
        return back()->with('Flash', 'your reply has been successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reply $reply)
    {
        //

        if($reply->user_id != auth()->id()){

            return response([],403);

        }
        $reply->delete();

        return back()->with('flash', ' your comment has been deleted');
    }
    public function __construct(){
        $this->middleware('auth');
    }
}
