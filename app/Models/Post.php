<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory,SoftDeletes;

//    to'dirilshi kerak bo'gan maydon
   protected $fillable =[
       'user_id',
       'category_id',
       'title',
       'short_content',
        'contents',
        'photo',
   ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(category::class);
    }


   public function comments(){
       return $this->hasMany(Comment::class);
   }
   public function tags(){
       return $this->belongsToMany(Teg::class);
   }





//   protected $guarded=['id'];

}
