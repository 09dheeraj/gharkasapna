<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Blog;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    protected $table = 'blogcategories';
    protected $fillable = ['name', 'slug'];

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
    public function generateSlug()
    {
        return Str::slug($this->name);
    }
}
