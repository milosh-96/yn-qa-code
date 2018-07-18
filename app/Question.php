<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title','slug','description','ip_address','enable_discussion','enable_answers'];
}
