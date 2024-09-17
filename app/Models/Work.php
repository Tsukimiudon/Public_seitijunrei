<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Work extends Model
{
    //データの論理削除
    use SoftDeletes;
    
    //作品登録を保存する機能
    protected $fillable = [
    'name',
    'introduction',
    ];
    
    use HasFactory;
    
    //リレーション
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    //作品タグ一覧
    public function getWorkByLimit(int $limit_count = 20)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    //作品別投稿一覧ページ
    public function getByWork(int $limit_count = 10)
    {
        return $this->posts()->with('work')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}