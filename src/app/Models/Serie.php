<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'name', 'plot', 'image', 'opening_video', 'year', 'duration'];

    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function users() {
        return $this->belongsToMany(User::class, 'favorites', 'serie_id', 'user_id');
    }
}
