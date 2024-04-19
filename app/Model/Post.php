<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'sub_title',
        'details',
        'slug',
        'thumbnail',
        'photo',
        'view_count',
        'status',
        'meta_title',
        'meta_description',
        'meta_image',
        'author_id',
        'post_type_id'
    ];

    public function scopeActive()
    {
        return $this->where('status', 'published');
    }

    public function postType()
    {
        return $this->belongsTo(PostType::class);
    }
    public function author()
    {
        return $this->belongsTo(Admin::class, 'author_id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
