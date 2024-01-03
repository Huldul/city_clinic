<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use TCG\Voyager\Traits\Translatable;
class Worker extends Model
{
    use HasFactory;
    use Translatable;
    protected $translatable = ['image', 'name', 'qualification', 'slug', 'working_hours', 'education', 'experience'];
    protected $fillable = ['name', 'slug', 'working_hours', 'image', 'education', 'qualification', 'experience'];
    public static function boot(){
        parent::boot();

        self::creating(function($model){
            $slug = Str::slug($model->name);
            $model->slug = Worker::where('slug', $slug)->exists() ? $slug.'-'.uniqid() : $slug;
        });

        self::updating(function($model){
            $slug = Str::slug($model->name);
            $model->slug = Worker::where('slug', '!=', $model->url)->where('url', $slug)->exists() ? $slug.'-'.uniqid() : $slug;
        });
    }
}
