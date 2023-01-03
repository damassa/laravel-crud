<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    protected $fillable = ['serie_id', 'user_id'];

    public function serie() {
        return $this->belongsTo(Serie::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
