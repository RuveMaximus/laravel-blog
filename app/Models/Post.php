<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content', 'author', 'date'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopeUnknownAuthor($query) 
    {
        return $query->whereNull('author');
    }
}
