<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Model\Page;
use App\Model\Post;

class HomeController extends Controller
{

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
        $user = User::where('status','ACTIVE')->count();
        $page = Page::where('status','Publish')->count();
        $post = Post::where('status','Publish')->count();
        return view('home', compact('user','page','post'));
    }
}
