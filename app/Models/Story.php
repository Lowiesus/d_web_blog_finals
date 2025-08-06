<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    // ✅ Add 'image' to the fillable fields
    protected $fillable = ['user_id', 'title', 'content', 'image'];

    protected $primaryKey = 'story_id';
    public $incrementing = true; // or false if you're using UUIDs
    protected $keyType = 'int'; // or 'string' if story_id is not integer

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
