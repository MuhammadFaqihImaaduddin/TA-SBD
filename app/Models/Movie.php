<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey = 'id_movie';
    protected $fillable = [
        'title',
        'release_date',
        'id_genre',
        'id_user',
        'id_review',
    ];
    public function genre()
    {
        return $this->belongsTo(Genre::class, 'id_genre', 'id_genre');
    }
}
