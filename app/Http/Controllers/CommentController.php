<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment; // Mengimpor model Comment dari namespace yang benar

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'item_id' => 'required|exists:items,id',
            'user_id' => 'required' // Pastikan user_id disertakan dalam validasi
        ]);

        // Simpan komentar bersama dengan user_id
        $comment = new Comment();
        $comment->content = $request->content;
        $comment->item_id = $request->item_id;
        $comment->user_id = $request->user_id; // Simpan user_id dari formulir
        $comment->save();

        return redirect()->back()->with('success', 'Comment added successfully.');
    }

    public function edit(Comment $comment)
    {
        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $comment->update($request->only('content'));

        return redirect()->route('comments.edit', $comment)->with('success', 'Comment updated successfully.');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('comments.store')->with('success', 'Comment deleted successfully.');
    }

    public function reply(Request $request, $commentId)
    {
        $request->validate([
            'content' => 'required',
            'item_id' => 'required|exists:items,id',
        ]);

        $parentComment = Comment::findOrFail($commentId);

        $reply = new Comment();
        $reply->content = $request->content;
        $reply->item_id = $request->item_id;
        $reply->user_id = auth()->id(); // menggunakan id pengguna yang sedang login
        $reply->parent_id = $parentComment->id;
        $reply->save();

        return redirect()->back()->with('success', 'Reply added successfully.');
    }
}
