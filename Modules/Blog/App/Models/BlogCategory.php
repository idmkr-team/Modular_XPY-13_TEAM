<?php

namespace Modules\Blog\App\Models;

use Modules\Blog\App\Models\Blog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Blog\App\Models\BlogCategoryTranslation;
use Modules\Blog\Database\factories\BlogCategoryFactory;

class BlogCategory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $hidden = ['front_translate', 'blogs'];

    protected $fillable = [];

    protected $appends = ['name', 'total_blog'];

    public function translate(){
        return $this->belongsTo(BlogCategoryTranslation::class, 'id', 'blog_category_id')->where('lang_code', admin_lang());
    }

    public function front_translate(){
        return $this->belongsTo(BlogCategoryTranslation::class, 'id', 'blog_category_id')->where('lang_code', front_lang());
    }


    public function getNameAttribute(){
        if($this->front_translate && $this->front_translate->name){
            return $this->front_translate->name;
        }elseif($this->translate && $this->translate->name){
            return $this->translate->name;
        }else{
            return 'Sin nombre';
        }
    }

    public function blogs(){
        return $this->hasMany(Blog::class, 'blog_category_id')->where(['status' => 1]);
    }


    public function getTotalBlogAttribute()
    {
        return $this->blogs->count();
    }

}
