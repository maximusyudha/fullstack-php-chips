<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'content','category', 'image'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}


