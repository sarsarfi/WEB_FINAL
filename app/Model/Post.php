<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    protected $table = 'posts';
    // ** اصلاح شده: 'created_at' را از $fillable حذف کنید **
    protected $fillable = ['user_id', 'title', 'content']; 
    
    // اگر ستون‌های created_at و updated_at را در دیتابیس اضافه کرده‌اید،
    // نیازی به public $timestamps = true; نیست، چون پیش‌فرض true است.
    // اما اگر می‌خواهید صراحتاً مشخص کنید:
    // public $timestamps = true; 

    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function relatedPosts()
    {
        return $this->hasMany(RelatedPost::class, 'post_1_id');
    }

    // این متد getRelatedPostsAttribute ممکن است باعث N+1 query شود.
    // اگر مشکل عملکرد داشتید، باید آن را به صورت eager loading مدیریت کنید.
    public function getRelatedPostsAttribute()
    {
        return RelatedPost::getRelatedPosts($this->id);
    }
    
    public function views() {
        return $this->hasOne(PostView::class);
    }
}