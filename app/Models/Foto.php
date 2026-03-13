<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Foto extends Model
{
    protected $table = 'foto';
    protected $primaryKey = 'fotoID';

    protected $fillable = [
        'judulFoto',
        'deskripsiFoto',
        'tanggalUnggah',
        'lokasiFile',
        'userID'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userID', 'userID');
    }

    public function komentars() {
        return $this->hasMany(Komentar::class, 'fotoID', 'fotoID');
    }

    public function likes() {
    return $this->hasMany(LikeFoto::class, 'fotoID', 'fotoID');
    }

    public function isLikedByUser() {
        return $this->likes()->where('userID', Auth::id())->exists();
    }
}
