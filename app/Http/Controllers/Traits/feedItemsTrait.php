<?php
namespace App\Http\Controllers\Traits;
use App\Question;
trait feedItemsTrait {
    public function getItems($number = 10) {
        return Question::orderByDesc('created_at')->limit($number)->get();
    }
}