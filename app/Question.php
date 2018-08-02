<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
class Question extends Model
{
    protected $fillable = ['title','hash','slug','question_text','answer1','answer2','user_id','ip_address','discussion_enabled','answers_enabled','likes_count','dislikes_count'];
    public function findByHash($hash) {
        return Question::where('hash','=',$hash)->first();
    }

    public function comments()
    {
        return $this->hasMany('App\Comment','object_id')->with('user');
    }

    public function commentsCount()
    {
        return count($this->comments);
    }

}
