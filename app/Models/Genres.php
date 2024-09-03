<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    use HasFactory;
    protected $table = 'genres';
    protected $fillable = ['id','name'];
    public function buku()
    {
        return $this->belongsToMany(Buku::class, 'buku_genres');
    }


}
