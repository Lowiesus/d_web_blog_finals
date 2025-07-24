<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    // ✅ Add 'image' to the fillable fields
    protected $fillable = ['user_id', 'title', 'content', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
