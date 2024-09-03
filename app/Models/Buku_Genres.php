<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku_Genres extends Model
{
    use HasFactory;
    protected $table = 'buku_genres';
    protected $fillable = [
        'genre_id',
        'buku_id'

    ];

}
