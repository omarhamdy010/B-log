<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Blog\App\Models\Blog;

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
        $blogs = Blog::simplePaginate(10);
        return view('home', compact('blogs'));
    }
}
