<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Str;


class Blog extends Model
{
    protected $table = 'blogs';

    use HasFactory;
    protected $fillable = [
        'blog_name',
        'blog_description',
        'images',
        'status',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'categories',
        'author_name',
        'short_description',
        'other_image',
        'tick_label',
        'tick_description',
        'comment',
        'reg_id'
    ];

    
    public function category_name() {

        return $this->belongsTo(Category::class, 'categories');
    }

    public function authorData()
    {
        return $this->belongsTo(Authmodel::class, 'author_name', 'name');
    }





    


    // public function blog_category()
    // {
    //     return $this->belongsTo(Category::class);
    // }

    // public function tags()
    // {
    //     return $this->belongsTo(Tag::class);
    // }

    // public function category(){
    //     return $this->belongsTo(Category::class,'categories');
    // }


    // protected static function boot()
    // {
    //     parent::boot();

    //     static::created(function ($blog) {
    //         $blog->slug = $blog->createSlug($blog->blog_name);
    //         $blog->save();
    //     });
    // }

    // /** 
    //  * create slug
    //  *
    //  * @return response()
    //  */
    // private function createSlug($blog_name)
    // {
    //     if (static::whereSlug($slug = Str::slug($blog_name))->exists()) {
    //         $max = static::whereTitle($blog_name)->latest('id')->skip(1)->value('slug');

    //         if (is_numeric($max[-1])) {
    //             return preg_replace_callback('/(\d+)$/', function ($mathces) {
    //                 return $mathces[1] + 1;
    //             }, $max);
    //         }

    //         return "{$slug}-2";
    //     }

    //     return $slug;
    // }
     
}
