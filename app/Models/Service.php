<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Service extends Model
{
    use HasFactory;
    use Translatable;
    protected $translatable = ['title', 'icon'];
    public function serviceprices() {
        return $this->hasMany(Serviceprice::class);
    }
}
