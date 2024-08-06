<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'slug',
        'user_id',
        'published_at',
    ];

    protected $dates = [
        'published_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the excerpt from the content.
     *
     * @param int $length The maximum character length of the excerpt.
     */
    public function excerpt($length = 30)
    {
        // Remove any Markdown syntax from the content, like #, ##, **, etc.
        $content = $this->content;
        $content = removeMarkdown($content);

        if($length > strlen($content)) {
            return $content;
        }

        return trim(substr($content, 0, $length - 3)) . '...';
    }
}