<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use TCG\Voyager\Traits\Translatable;

class Direction extends Model
{
    use HasFactory;
    use Translatable;
    protected $translatable = ['title', 'subtitle', 'image'];
    protected $fillable = ['title', 'slug', 'subtitle', 'image'];
    public function subdirections() {
        return $this->hasMany(Subdirection::class);
    }
    public static function boot(){
        parent::boot();

        self::creating(function($model){
            $slug = Str::slug($model->title);
            $model->slug = Direction::where('slug', $slug)->exists() ? $slug.'-'.uniqid() : $slug;
        });

        self::updating(function($model){
            $slug = Str::slug($model->title);
            $model->slug = Direction::where('slug', '!=', $model->url)->where('url', $slug)->exists() ? $slug.'-'.uniqid() : $slug;
        });
    }
}
