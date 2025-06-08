<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaceController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $posts = Post::with('attachments', 'user')->latest()->get();

        $followingIds = $user->followings->pluck('following_id')->toArray();

        $suggestedUsers = User::where('id', '!=', $user->id)
            ->whereNotIn('id', $followingIds)
            ->take(5)
            ->get();

        $followings = $user->followings()
            ->where('is_accepted', true)
            ->with('following')
            ->get();
         
        return view('pages.index', compact('posts', 'user', 'suggestedUsers', 'followings'));
    }

    public function show()
    {
        $user = Auth::user();
        return view('pages.profile', compact('user'));
    }
}
