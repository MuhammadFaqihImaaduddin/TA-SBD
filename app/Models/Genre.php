<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genre extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey = 'id_genre';
    protected $fillable = [
        'name',
    ];
    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'movie_genre', 'id_genre', 'id_movie');
    }
}
