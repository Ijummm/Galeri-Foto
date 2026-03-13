<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LikeFoto extends Model
{
    protected $table = 'likefoto'; 
    protected $primaryKey = 'likeID';

    protected $fillable = [
        'fotoID', 
        'userID', 
        'tanggalLike'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'userID', 'userID');
    }
}