<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item; // Assuming Item model is used in the home controller

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Assuming you want authentication middleware for the home page
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Fetch items grouped by categories to display on the home page
        $articles = Item::where('category', 'Artikel')->get();
        $essays = Item::where('category', 'Essai')->get();
        $poems = Item::where('category', 'Puisi')->get();
        $novels = Item::where('category', 'Novel')->get();

        // Pass the fetched items to the home view
        return view('home', compact('articles', 'essays', 'poems', 'novels'))->with(['title' => 'Home']);
    }
}
