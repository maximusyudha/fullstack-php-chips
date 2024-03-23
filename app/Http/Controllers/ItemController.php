<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        // Fetch items grouped by categories
        $articles = Item::where('category', 'Artikel')->get();
        $essays = Item::where('category', 'Essai')->get();
        $poems = Item::where('category', 'Puisi')->get();
        $novels = Item::where('category', 'Novel')->get();
        
        // Fetch all items
        $items = Item::all();
        
        // Pass data to the view
        return view('dashboard', compact('items', 'articles', 'essays', 'poems', 'novels'))->with(['title' => 'Dashboard']);
    }

    public function filter(Request $request)
{
    $category = $request->input('category');
    if($category) {
        $items = Item::where('category', $category)->get();
    } else {
        $items = Item::all();
    }

    return view('dashboard', compact('items', 'category'));
}


    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        // Validate input
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            // 'content' => 'required|string',
            'category' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move('images/', $profileImage);
            $validatedData['image'] = $profileImage;
        }

        // Store the item
        Item::create($validatedData);

        return redirect()->route('items.index');
    }

    public function show($id)
    {
        $item = Item::findOrFail($id);
        return view('show', compact('item'));
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        // Validate input
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            // 'content' => 'required|string',
            'category' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Find the item
        $item = Item::findOrFail($id);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move('images/', $profileImage);
            $validatedData['image'] = $profileImage;
        }

        // Update the item
        $item->update($validatedData);

        return redirect()->route('items.index');
    }

    public function destroy($id)
    {
        // Find the item and delete it
        $item = Item::findOrFail($id);
        $item->delete();
        return redirect()->route('items.index');
    }
}

