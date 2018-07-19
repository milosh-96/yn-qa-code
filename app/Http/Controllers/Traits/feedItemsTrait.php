<?php
namespace App\Http\Controllers\Traits;
use App\Question;
trait feedItemsTrait {
    public function getItems() {
        return Question::orderByDesc('created_at')->get();
    }
}