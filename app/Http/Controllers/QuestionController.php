<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class QuestionController extends Controller
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
    public function store(Request $request)
    {
        $slug = str_slug($request->title) . '-' . substr(md5(date("Y-m-d H:i:s")),0,8);
        $ip = $_SERVER['REMOTE_ADDR'];
        Question::create(
            [
                "title"=>$request->title,
                "slug"=>$slug,
                "question_text"=>$request->question_text,
                "answer1"=>$request->answer1,
                "answer2"=>$request->answer2,
                "user_id"=>auth()->user()->id,
                "ip_address"=>$ip,
                "discussion_enabled"=>$request->discussion_enabled
            ]
        );
        return redirect()->back(); // TODO: Should retun to the question thread! //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question,$id)
    {
        $question = $question->where('id','=',$id)->first();
        return view('questions.modals.edit-item')->with(['item'=>$question]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
