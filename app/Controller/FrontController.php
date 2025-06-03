<?php
namespace App\Controller;

use App\Model\User;
use App\Model\Post;
// اگر از RelatedPost و PostView در Model استفاده می‌کنید، باید اینجا use کنید
use App\Model\RelatedPost;
use App\Model\PostView;

class FrontController
{
    public function home()
    {
        // نمایش لیست دانشجویان به ترتیب الفبا
        $students = User::orderBy('name')->get();
        view('home.php', ['students' => $students]);
    }
    
    public function posts()
    {
        $posts = Post::with(['user', 'views'])->get();
        view('posts.php', ['posts' => $posts]);
    }

    public function matrix()
    {
        // محاسبه ماتریس A
        $posts = Post::with('relatedPosts', 'views')->limit(70)->get();
        $matrix = $this->calculateMatrix($posts);
        view('matrix.php', ['matrix' => $matrix]);
    }
    
    public function ranking()
    {
        // 1. واکشی تمام پست‌ها با اطلاعات مرتبط (کاربر و بازدیدها)
        $posts = Post::with(['user', 'views'])->get();

        // اگر پست‌ها خالی هستند، نیازی به ادامه محاسبه رتبه‌بندی نیست.
        if ($posts->isEmpty()) {
            view('ranking.php', ['ranking' => []]);
            return;
        }

        // 2. ساخت ماتریس (Matrix) برای calculateRanking
        // از متد calculateMatrix که حالا منطق صحیح را دارد، استفاده می‌کنیم.
        $matrix = $this->calculateMatrix($posts); 

        // 3. محاسبه رتبه‌بندی
        // calculateRanking یک آرایه از امتیازات (float) را برمی‌گرداند.
        $scores = $this->calculateRanking($matrix, $posts);

        // 4. ترکیب امتیازات با اطلاعات کامل پست‌ها
        $rankedPosts = [];
        foreach ($posts as $index => $post) {
            // اطمینان حاصل کنید که ایندکس $scores با ایندکس $posts مطابقت دارد
            $score = $scores[$index] ?? 0; // اگر ایندکس در $scores وجود نداشت، 0 در نظر بگیر
            $rankedPosts[] = [
                'post' => $post, // آبجکت کامل Post
                'score' => $score, // امتیاز رتبه‌بندی
            ];
        }

        // 5. مرتب‌سازی نهایی بر اساس امتیاز
        usort($rankedPosts, function($a, $b) {
            return $b['score'] <=> $a['score']; // مرتب‌سازی نزولی بر اساس امتیاز
        });

        // 6. ارسال به View
        view('ranking.php', ['ranking' => $rankedPosts]);
    }

    // متد calculateRanking (فقط یک بار تعریف می‌شود)
    private function calculateRanking($matrix, $posts)
    {
        $n = count($matrix); // یا count($posts) اگر matrix بر اساس پست‌هاست
        if ($n === 0) {
            return []; // اگر پستی نیست، آرایه خالی برگردانید
        }

        $v = array_fill(0, $n, 1.0);
        
        // روش توانی برای محاسبه بردار ویژه
        for ($k = 0; $k < 100; $k++) {
            $Av = array_fill(0, $n, 0.0);
            
            for ($i = 0; $i < $n; $i++) {
                for ($j = 0; $j < $n; $j++) {
                    if (isset($matrix[$i][$j])) {
                        $Av[$i] += $matrix[$i][$j] * $v[$j];
                    }
                }
            }
            
            $norm = sqrt(array_sum(array_map(function($x) { return $x * $x; }, $Av)));
            
            if ($norm == 0) {
                for ($i = 0; $i < $n; $i++) {
                    $v[$i] = 1.0 / $n; // رتبه‌بندی یکسان پیش‌فرض
                }
                break; // از حلقه Power Iteration خارج می‌شویم
            }
            
            for ($i = 0; $i < $n; $i++) {
                $v[$i] = $Av[$i] / $norm;
            }
        }
        return $v; // این متد فقط امتیازات خام را برمی‌گرداند
    }

    // متد calculateMatrix (که قبلاً اضافه کرده بودید)
    private function calculateMatrix($posts)
    {
        $n = count($posts);
        // اگر $posts یک Collection Eloquent است و خالی باشد، $n صفر خواهد بود.
        if ($n === 0) {
            return [];
        }

        $matrix = array_fill(0, $n, array_fill(0, $n, 0));
        
        // ایجاد یک نگاشت از post_id به اندیس
        $postIndexMap = [];
        foreach ($posts as $index => $post) {
            $postIndexMap[$post->id] = $index;
        }
        
        foreach ($posts as $i => $post1) {
            // اطمینان حاصل کنید که relatedPosts و views از قبل eager loaded شده باشند.
            // اگر در متد ranking() از Post::with('relatedPosts', 'views') استفاده کرده‌اید، اینجا مشکلی نیست.
            // در متد matrix() هم از Post::with('relatedPosts', 'views') استفاده شده.
            $relatedPosts = $post1->relatedPosts;
            $totalViews = $post1->views ? $post1->views->view_count : 0;
            
            foreach ($relatedPosts as $related) {
                // چک کنید که post_2_id (یا post_1_id) در آبجکت $related وجود دارد.
                // فرض بر این است که relatedPosts یک Collection از RelatedPost مدل‌ها است.
                $post2Id = $related->post_2_id; 
                if (isset($postIndexMap[$post2Id])) {
                    $j = $postIndexMap[$post2Id];
                    $post2 = $posts[$j];
                    $post2Views = $post2->views ? $post2->views->view_count : 0;
                    
                    if ($totalViews + $post2Views > 0) {
                        $matrix[$i][$j] = $post2Views / ($totalViews + $post2Views);
                    }
                }
            }
            
            // نرمال‌سازی سطرها
            $rowSum = array_sum($matrix[$i]);
            if ($rowSum > 0) {
                foreach ($matrix[$i] as &$value) {
                    $value /= $rowSum;
                }
            }
        }
        
        return $matrix;
    }
}