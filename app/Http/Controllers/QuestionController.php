<?php

namespace App\Http\Controllers;

use App\Question;
use App\User;

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
        $slug = str_slug($request->title);
        $hash = substr(md5($request->title . '-'. date("Y-m-d H:i:s")),0,8);
        $ip = $_SERVER['REMOTE_ADDR'];
        $question = Question::create(
            [
                "title"=>$request->title,
                "hash"=>$hash,
                "slug"=>$slug,
                "question_text"=>$request->question_text,
                "answer1"=>$request->answer1,
                "answer2"=>$request->answer2,
                "user_id"=>auth()->user()->id,
                "ip_address"=>$ip,
                "discussion_enabled"=>$request->discussion_enabled
            ]
        );
        return redirect()->route('question.show',['slug'=>$question->slug,'hash'=>$question->hash]); // TODO: Should retun to the question thread! //
        // TODO: Should retun to the question thread! //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question,$hash)
    {
        $question = $question->findByHash($hash);
        return view('questions.show')->with(['item'=>$question]);
    }

    public function apiItem(Question $question,$hash)
    {
        return $question->findByHash($hash);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question,$hash)
    {
        $question = $question->findByHash($hash);

        return view('questions.modals.edit-item')->with(['item'=>$question]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Question $question,$hash)
    {
        $slug = str_slug($request->title);
        $ip = $_SERVER['REMOTE_ADDR'];
        $question = $question->findByHash($hash);
        //
        $question->title = $request->title;
        $question->slug = $slug;
        $question->question_text = $request->question_text;
        $question->answer1 = $request->answer1;
        $question->answer2 = $request->answer2;
        $question->ip_address = $ip;
        $question->discussion_enabled = $request->discussion_enabled;
        $question->save();
        return redirect()->route('question.show',['slug'=>$question->slug,'hash'=>$question->hash]); // TODO: Should retun to the question thread! //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Question $question, $hash)
    {
        $question = $question->findByHash($hash);

        $question->delete();
        $request->session()->flash('msg','The question is deleted successfully.');
        return redirect()->route('index');
    }


    public function answerQuestionApi(Question $question,$hash,Request $request,User $user)
    {
        $question = $question->findByHash($hash);
        $ip = $_SERVER['REMOTE_ADDR'];
        
        if(auth()->user()->isAnswered($question->id)) {
            $answer = DB::table('answer_question')->where('user_id','=',auth()->user()->id)->where('question_id','=',$question->id)->first();
            if($request->answer == $answer->answer) {
                DB::table('answer_question')->where('user_id','=',auth()->user()->id)->where('question_id','=',$question->id)->delete();
                session()->flash('msg','Answer has been removed.');
            } else {
                DB::table('answer_question')->where('user_id','=',auth()->user()->id)->where('question_id','=',$question->id)->update(['answer'=>$request->answer]);
                session()->flash('msg','Your Answer has been changed.');
            }
            return redirect()->back();
        }
        else {
        DB::table('answer_question')->insert([
            'answer'=>$request->answer,
            'user_id'=>auth()->user()->id,
            'question_id'=>$question->id,
            'ip_address'=>$ip
        ]);
        }
        session()->flash('msg','Thank you for your Answer.');
        return redirect()->back();
    }
}
