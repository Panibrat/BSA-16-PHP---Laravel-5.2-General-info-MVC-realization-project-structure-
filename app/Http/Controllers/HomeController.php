<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex()
    {
        return View::make('home.index');
    }
}