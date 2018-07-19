<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title','slug','question_text','answer1','answer2','user_id','ip_address','discussion_enabled','answers_enabled','likes_count','dislikes_count'];
}
