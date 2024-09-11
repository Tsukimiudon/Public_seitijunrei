<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Place extends Model
{
    use HasFactory, SoftDeletes;
    
    //論理削除で子テーブルも削除
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;
    protected $softCascade = ['images'];
    
    //ブログ投稿作成処理用のfillable
    protected $fillable = [
    'name',
    'address',
    'caption',
    'post_id',
    'latitude',
    'longitude',
    ];
    
    //リレーション
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}