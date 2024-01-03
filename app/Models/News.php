<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use TCG\Voyager\Traits\Translatable;

class News extends Model
{
    use HasFactory;
    use Translatable;
    protected $translatable = ['title', 'subtitle', 'main', 'image'];
    protected $fillable = ['title', 'slug', 'main', 'image', 'subtitle'];
    public static function boot(){
        parent::boot();

        self::creating(function($model){
            $slug = Str::slug($model->title);
            $model->slug = News::where('slug', $slug)->exists() ? $slug.'-'.uniqid() : $slug;
        });

        self::updating(function($model){
            $slug = Str::slug($model->title);
            $model->slug = News::where('slug', '!=', $model->url)->where('url', $slug)->exists() ? $slug.'-'.uniqid() : $slug;
        });
    }
}
