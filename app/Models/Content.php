<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'contents';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'date',
        'content',
        'description',
        'media_url',
        'media_type',
        'likes_count',
        'comments_count',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'date',
        'likes_count' => 'integer',
        'comments_count' => 'integer',
        'status' => 'string',
    ];

    /**
     * Get the user that owns the content.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

