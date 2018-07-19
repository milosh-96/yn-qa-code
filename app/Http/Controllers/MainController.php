<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Controllers\Traits\feedItemsTrait;


class MainController extends Controller
{
    use feedItemsTrait;
    public function home() {
        $questions = $this->getItems();
        return view('public.home.index')->with(['questions'=>$questions]);
    }
}
