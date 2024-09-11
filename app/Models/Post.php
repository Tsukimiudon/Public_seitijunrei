<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    use HasFactory;
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;
    
    //論理削除で子テーブルも削除
    //protected $softCascade = ['places', ['images'], ['comments'], ['bookmarks']];
    
    //ブログ投稿作成処理用のfillable
    protected $fillable = [
    'title',
    'body',
    'work_id',
    'user_id',
    'eyecatch_url',
    ];
    
    //リレーション
    public function work()
    {
        return $this->belongsTo(Work::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }
    public function places()
    {
        return $this->hasMany(Place::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    
    //topページ
    public function getPaginateByLimit(int $limit_count = 5)
    {
        return $this::with('work', 'user')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    //投稿一覧ページ
    public function getPaginateByLimit_index_post(int $limit_count = 10)
    {
        return $this::with('work', 'user')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}