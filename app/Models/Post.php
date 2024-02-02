<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post {
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug){
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all(){
        return cache()->rememberForever('posts.all', function() {
            $files = File::files(resource_path("posts/"));
    
            $posts = array_map(function($file) {
                $document = YamlFrontMatter::parseFile($file);
                return new Post(
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug
                );
            }, $files);

            usort($posts, function ($x, $y) {
                if ($x->date == $y->date) {
                    return 0;
                } else if (($x->date > $y->date)) {
                    return -1;
                } else {
                    return 1;
                }
            });
            
            return $posts;
        });
    }
        
    public static function find($slug) {
        $posts = static::all();
        $filteredPosts = array_filter($posts, function($post) use ($slug){
            return $post->slug == $slug;
        });
        return (array_values($filteredPosts))[0];
    }
}