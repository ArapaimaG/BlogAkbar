<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'author_id',
        'category_id',
        'status',
        'thumbnail',
        'views'
    ];

    // Increment views method
    public function incrementViews()
    {
        $this->increment('views'); // Increment the views column by 1
    }

    // Boot method to handle automatic slug creation and author association
    protected static function boot()
    {
        parent::boot();

        // Automatically generate the slug from the title
        static::saving(function ($post) {
            if (empty($post->slug) || $post->isDirty('title')) {
                $post->slug = Str::slug($post->title);
            }
        });

        // Set author_id to the logged-in user's ID
        static::creating(function ($post) {
            $post->author_id = Auth::id();
        });
    }

    // Define relationships
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    // Accessor for image URL
    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->thumbnail);
    }
}
