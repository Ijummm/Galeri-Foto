<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{
    public function index() {
        $fotos = Foto::with('user')->get();
        return view('galeri.index', compact('fotos'));
    }

    public function create() {
        return view('galeri.create');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'judulFoto'     => 'required|string|max:255',
            'deskripsiFoto' => 'required',
            'lokasiFile'    => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except('lokasiFile');

        if ($request->hasFile('lokasiFile')) {
            $file = $request->file('lokasiFile');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            
            $file->storeAs('photos', $namaFile, 'public'); 
            
            $data['lokasiFile'] = $namaFile;
        }

        $data['tanggalUnggah'] = now(); 
        $data['userID'] = auth::id();

        Foto::create($data);

        return redirect()->route('galeri.index')->with('success', 'Foto berhasil ditambahkan!');
    }

    public function destroy($id) 
    {
        $foto = Foto::findOrFail($id);
        if (Auth::id() !== $foto->UserID) {
            return abort(403, 'Anda tidak berhak menghapus foto ini');
        }
        Storage::delete('public/photos/' . $foto->lokasiFile);
        $foto->delete();

        return redirect()->route('galeri.index')->with('success', 'Foto dihapus!');
    }

    public function edit($id)
    {
        $foto = Foto::findOrFail($id);
        return view('galeri.edit', compact('foto'));
    }

    public function update(Request $request, $id)
    {
        $foto = Foto::findOrFail($id);

        $request->validate([
            'judulFoto'     => 'required|string|max:255',
            'deskripsiFoto' => 'required',
            'lokasiFile'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except('lokasiFile');

        if ($request->hasFile('lokasiFile')) {
            if (file_exists(storage_path('app/public/photos/' . $foto->lokasiFile))) {
                unlink(storage_path('app/public/photos/' . $foto->lokasiFile));
            }

            $file = $request->file('lokasiFile');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('photos', $namaFile, 'public');
            $data['lokasiFile'] = $namaFile;
        }

        $foto->update($data);

        return redirect()->route('galeri.index')->with('success', 'Foto berhasil diperbarui!');
    }

    public function show($id)
    {
        $foto = Foto::with('user')->findOrFail($id);
        return view('galeri.show', compact('foto'));
    }
}