<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    use HasFactory;
    protected $fillable = ['reg_id', 'blog_id', 'comments'];

    public function adminData()
    {
        return $this->belongsTo(Authmodel::class, 'reg_id');
    }

    // public function blog()
    // {
    //     return $this->belongsTo(Blog::class, 'blog_id');
    // }


}
