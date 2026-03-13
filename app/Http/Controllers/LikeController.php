<?php

namespace App\Http\Controllers;

use App\Models\LikeFoto;
use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggleLike($id)
    {
        $userID = Auth::id();

        $existingLike = LikeFoto::where('fotoID', $id)->where('userID', $userID)->first();

        if ($existingLike) {
            $existingLike->delete();
        } else {
            LikeFoto::create([
                'fotoID' => $id,
                'userID' => $userID,
                'tanggalLike' => now()
            ]);
        }
        return back();
    }

    public function myLikes()
    {
        $userId = Auth::id();

        $likedPhotos = Foto::whereHas('likes', function ($query) use ($userId) {
            $query->where('userID', $userId);
        })->latest()->get();

        return view('galeri.likes', compact('likedPhotos'));
    }
}
