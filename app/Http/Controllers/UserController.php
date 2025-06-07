<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::with('posts.attachments')->findOrFail($id);

        // Jika user mengakses dirinya sendiri, redirect ke halaman profil pribadi
        if($user->id === Auth::id()) {
            return redirect()->route('profile');
        }

        // Cek apakah akun ini private dan apakah follow sudah disetujui
        $isFollowingAccepted = $user->followers()
            ->where('follower_id', Auth::id())
            ->where('is_accepted', true)
            ->exists();

        $isPending = $user->followers()
            ->where('follower_id', Auth::id())
            ->where('is_accepted', false)
            ->exists();

        return view('pages.user-profile', compact('user', 'isFollowingAccepted', 'isPending'));
    }
}
