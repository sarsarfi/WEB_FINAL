<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RelatedPost extends Model {
    protected $table = 'related_post';
    protected $fillable = ['post_1_id', 'post_2_id'];
public static function getRelatedPosts($postId)
{
    $related = self::where('post_1_id', $postId)
                 ->orWhere('post_2_id', $postId)
                 ->get();
    
    $relatedPosts = [];
    foreach ($related as $relation) {
        $relatedId = $relation->post_1_id == $postId ? $relation->post_2_id : $relation->post_1_id;
        $relatedPosts[] = Post::find($relatedId);
    }
    
    return collect($relatedPosts);
}

}