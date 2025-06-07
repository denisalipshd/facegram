<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\PostAttachment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'caption' => 'nullable|string',
            'images.*' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $post = Post::create([
            'user_id' => Auth::id(),
            'caption' => $request->caption,
        ]);

         // Simpan gambar-gambar
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('post_attachments', 'public');

                PostAttachment::create([
                    'post_id' => $post->id,
                    'storage_path' => $path,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Post berhasil dibuat!');

    }
}
