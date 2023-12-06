<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Blog extends Model
{
    use HasFactory;

    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;
    public $image;
    public function __construct($title,$excerpt,$date,$body,$slug,$image) {
        $this->title   = $title;
        $this->excerpt = $excerpt;
        $this->date    = $date;
        $this->body    = $body;
        $this->slug    = $slug;
        $this->image    = $image;
    }
    
    public static function allBlogs(){
        //File facade'i kullanarak tüm dosyaları alıyoruz
        $blogs = File::files(resource_path("/blogs"));
        return array_map(function($blog){
            //map geriye yeni array döndürür, getContents ile sadece dosya içeriklerini alıp arrayi yeniliyoruz ve return işlemi yapıyoruz.
            return $blog->getContents();
        }, $blogs);
    }

    public static function find($slug){
    
        // Laravel helper fonksiyonu resource_path sayesinde direkt resources klasörünü hedef alabiliyoruz.
        $path = resource_path("/blogs/{$slug}.html");

        if(!file_exists($path)){
            throw new ModelNotFoundException;
        }

        // 10 saniye ömürlü cache oluşturma (Her defasında içerikleri çağırmak yerine cachedan veriler alınıyor.).
        return cache()->remember("blog.{$slug}", 10, function() use($path){
            return file_get_contents($path);
        });

    }
}
