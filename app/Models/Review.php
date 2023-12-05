<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'review';
    protected $primaryKey = 'id_review';
    protected $fillable = [
        'rating',
        'comment',
        'id_movie',
        'id_user',
    ];
    public function movie()
    {
        return $this->belongsTo(Movie::class, 'id_movie', 'id_movie');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
