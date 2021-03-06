<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $filable = ['comment_text','user_id','object_id','ip_address','reply','comment_id'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function isLoggedUserAuthor() {
        if($this->user == auth()->user()) {
            return true;
        }
        return false;
    }
    private function dateFormat($value) {
        return date("d.m.Y. H:i",strtotime($value));
    }
    public function createdAt() {
        return $this->dateFormat($this->created_at);
    }
}
