<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFavorite\Traits\Favoriteable;

class flower extends Model
{
    use HasFactory , Favoriteable;


    protected $guarded = ['id'];

    public function category(){

        return $this->belongsTo(Category::class);
    }
}
