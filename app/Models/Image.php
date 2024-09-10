<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    use HasFactory;
    
    //ブログ投稿作成処理用のfillable
    protected $fillable = [
    'post_id',
    'place_id',
    'real_image_url',
    'anime_image_url',
    ];
    
    //リレーション
    public function place()
    {
        return $this->belongsTo(Place::class);
    }
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}