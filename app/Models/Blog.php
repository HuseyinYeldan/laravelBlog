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

    // Relationship for blog belonging to a category
    public function category(){
        return $this->belongsTo(Category::class);
    }       

    //Relationship for blogs and author connection
    public function user(){
        return $this->belongsTo(User::class);
    }

}
