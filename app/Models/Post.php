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

    public function __construct($title, $excerpt, $date, $body, $slug) {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all() {
        return collect(File::files(resource_path("posts")))
        ->map(fn($file) => YamlFrontMatter::parseFile($file))    
        ->map(fn($document)=> new Post(
            $document->title,
            $document->excerpt,
            $document->date,
            $document->body(),
            $document->slug
        ));
    // $posts = array_map(function($file) {
    //     $document = YamlFrontMatter::parseFile($file);

    //     return $posts[] = new Post(
    //         $document->title,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body(),
    //         $document->slug
    //     );
    // }, $files);
    }

    public static function find($slug) {
        
        return static::all()->firstWhere('slug', $slug);

        // $path = resource_path("posts/{$slug}.html");

        // if (!file_exists($path)) {
        //     throw new ModelNotFoundException();
        // }

        // return cache()->remember("posts.{$slug}", 5, function () use ($path) {
        //     return file_get_contents($path);
        // });
    }
}