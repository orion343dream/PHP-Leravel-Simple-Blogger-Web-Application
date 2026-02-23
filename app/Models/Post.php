<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Post Model
 * 
 * Demonstrates relationships in Eloquent ORM
 * 
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $content
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 */
class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'published',
    ];

    /**
     * Get the user that owns the post.
     * 
     * Example of Many-to-One relationship
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all comments for this post.
     * 
     * Example of One-to-Many relationship
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get post with comment count.
     */
    public function getCommentCountAttribute(): int
    {
        return $this->comments()->count();
    }

    /**
     * Get post summary (first 100 characters)
     */
    public function getSummary(): string
    {
        return substr($this->content, 0, 100) . '...';
    }

    /**
     * Scope to get published posts
     */
    public function scopePublished($query)
    {
        return $query->where('published', true);
    }
}
