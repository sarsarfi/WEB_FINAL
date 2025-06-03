<?php
require __DIR__ . '/index.php';

use App\Model\Post;
use App\Model\PostView;
use App\Model\RelatedPost;

// تولید بازدیدهای تصادفی
foreach (Post::all() as $post) {
    PostView::updateOrCreate(
        ['post_id' => $post->id],
        ['view_count' => rand(1, 1000)]
    );
}

echo "داده‌های اولیه با موفقیت ایجاد شدند.";