<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Blog extends Model
{
    use HasFactory;

    public $title;
    public $excerpt;
    public $body;
    public $date;
    public $slug;
    public $image;
    
    public function __construct($title,$excerpt,$body,$date,$slug,$image) {
        $this->title   = $title;
        $this->excerpt = $excerpt;
        $this->body    = $body;
        $this->date    = $date;
        $this->slug    = $slug;
        $this->image    = $image;
    }
    
    public static function allBlogs(){
        //Cache the blogs infinitely
        return cache()->rememberForever('posts.all', function(){
            //get all the files in resources/blogs
            return collect(File::files(resource_path('blogs')))
            ->map(fn($file) => YamlFrontMatter::parseFile($file->getPathname()))
            ->map(fn($document) => new Blog(
                $document->title,
                $document->excerpt,
                $document->body(),
                $document->date,
                $document->slug,
                $document->image,
            ))->sortByDesc('date');
        });
    }

    public static function find($slug)
    {
        $blogs = static::allBlogs()->firstWhere('slug',$slug);

        return $blogs;
    }

    public static function findOrFail($slug){
        $blogs = static::find($slug);
        if(!$blogs){
            throw new ModelNotFoundException;
        }
        return $blogs;
    }
}
