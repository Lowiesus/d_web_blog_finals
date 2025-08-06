<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $table = 'stories'; // ✅ Explicitly specify table name
    protected $primaryKey = 'story_id';
    public $incrementing = true; // false if using UUIDs
    protected $keyType = 'int'; // or 'string' if story_id is not an int

    protected $fillable = ['user_id', 'title', 'content', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
