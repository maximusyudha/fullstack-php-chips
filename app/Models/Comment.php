<?php

namespace App\Models; // Ubah namespace menjadi App\Models

use Illuminate\Database\Eloquent\Model;
use App\Models\Item; // Import model Item jika belum diimpor
use App\Models\User; // Import model User jika belum diimpor

class Comment extends Model
{
    protected $fillable = ['content', 'item_id', 'user_id'];

    // Definisikan relasi dengan model Item
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    // Definisikan relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
