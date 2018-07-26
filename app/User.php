<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name','first_name','last_name','email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function name()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
    public function answers() {
        return DB::table('answer_question')->where('user_id',$this->id)->get();
    }

    public function isAnswered($item) {
       $answers = DB::table('answer_question')->where('user_id',$this->id)->where('question_id',$item)->get();
       if(count($answers) > 0) {
           return true;
       }
       return false;
    }

    public function whichAnswer($item) {
        $question = DB::table('answer_question')->where('user_id',$this->id)->where('question_id',$item)->first();
        if($question) {
            if($question->answer == 0) {
                return "answer1";
            } 
            if($question->answer == 1) {
                return "answer2";
            } 
        }
        return false;
    }
}
