<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //$fillable, çoklu eklemelerde izin verilen verileri belirtir. Onun dışındaki eklenen veriler umursanmaz. 
    // protected $fillable = ['title','excerpt','image','body'];
    
    //$guarded, çoklu eklemelerde izin verilmeyen verileri belirler ve haricindekileri ekler.     
    // protected $guarded = ['id'];

    //Genel olarak çoklu eklemeler yapılması doğru kabul edilmez o yüzden guarded'ın boş bırakıldığını görmek normal.
    protected $guarded = [];

    protected $with = ['user','category'];
    
    use HasFactory;

    public function scopeFilter($query, array $filters){
        $query->when($filters['search']??false, function ($query, $search){
            $query->where(fn($query)=>
            $query->where('title','like','%'.$search.'%')
            ->orWhere('body','like','%'.$search.'%')
            ->orWhere('excerpt','like','%'.$search.'%')
        );
        });

        $query->when($filters['category']??false, function ($query, $category){
            $query->whereHas('category', fn ($query)=> $query->where('slug',$category));
        });
    
        $query->when($filters['user']??false, function ($query, $user){
            $query->whereHas('user', fn ($query)=> $query->where('username',$user));
        });
    }

    // Relationship for blog belonging to a category
    public function category(){
        return $this->belongsTo(Category::class);
    }       

    //Relationship for blogs and author connection
    public function user(){
        return $this->belongsTo(User::class);
    }

}
