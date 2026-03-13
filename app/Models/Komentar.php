<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table = 'komentarfoto'; // Karena nama tabel tidak jamak (s)
    protected $primaryKey = 'komentarID';
    protected $fillable = ['fotoID', 
        'userID', 
        'isiKomentar', 
        'tanggalKomentar'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userID', 'userID');
    }
}
