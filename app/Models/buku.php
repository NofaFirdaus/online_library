<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Contracts\Database\Eloquent\Builder;


class buku extends Model
{
    use HasFactory;
    protected $table = 'buku';
    protected $with = ['author','genres'];


    // protected $guarded = ['id'];
    protected $fillable = [
        'title',
        'deskripsi',
        'author_id',
        'sampul_buku',
        'file_buku',
        'slug'
    ];

    public function author(): belongsTo
    {
        return $this->belongsTo(User::class);

    }

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorit', 'buku_id', 'user_id')->withTimestamps();
    }
public function genres()
{
    return $this->belongsToMany(Genres::class,'buku_genres');
}

    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when($filters['search'] ?? false, function (Builder $query, $search) {
            $query->where('title', 'like', '%' . $search . '%');
        });

        $query->when($filters['genre'] ?? false, function (Builder $query, $genre) {
            $query->whereHas('genres', function (Builder $q) use ($genre) {
                $q->where('name', $genre);
            });
        });
    }

}
