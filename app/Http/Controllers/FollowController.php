<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'following_id' => 'required|exists:users,id'
        ]);

        $existing = Follow::where('follower_id', Auth::id())
            ->where('following_id', $request->following_id)
            ->first();

        if(!$existing) {
            Follow::create([
                'follower_id' => Auth::id(),
                'following_id' => $request->following_id,
                'is_accepted' => false,
            ]);
        }
        
        return back()->with('success', 'Permintaan pertemanan dikirim.');
    }

    public function destroy($id)
    {
        $followerId = Auth::id();
        $followingId = $id;

        $follow = Follow::where('follower_id', $followerId)
            ->where('following_id', $followingId)
            ->first();

        if($follow) {
            $follow->delete();
            return back()->with('success', 'Berhasil membatalkan pertemanan.');
        }

        return back()->with('error', 'Data follow tidak ditemukan.');
    }
}
