<?php

namespace App\Http\Controllers;

use App\Question;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Comment $comment, Question $question)
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $reply = $request->comment_id != null ? true : false;
        $question = $question->findByHash($request->object_hash);
        //
        $comment->user_id = auth()->user()->id;
        $comment->object_id = $question->id;
        $comment->comment_id = $request->comment_id;
        $comment->reply = $reply;
        $comment->ip_address = $ip;
        $comment->comment_text = $request->comment_text;
        $comment->save();
        session()->flash('msg','Your comment has been submitted.');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment,Question $question)
    {
        $comment = $comment->find($request->pk);

        $comment->{$request->name} = $request->value;
        $comment->save();
        return $comment;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
