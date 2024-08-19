<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $articles= Article::all();
        // return view("articles.index");
        // return view('home');

        $data = Article::where("user_id",Auth::user()->id)->latest()->paginate(5);
        return view("home", ["articles" => $data]);
    }
}
