<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KomentarController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'isiKomentar' => 'required|string',
        ]);

        Komentar::create([
            'fotoID'            => $id,
            'userID'            => Auth::id(),
            'isiKomentar'       => $request->isiKomentar,
            'tanggalKomentar'   => now(),
        ]);

        return back()->with('success', 'Komentar berhasil dikirim!');
    }
}