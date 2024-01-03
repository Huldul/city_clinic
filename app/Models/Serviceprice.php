<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Serviceprice extends Model
{
    use HasFactory;
    use Translatable;
    protected $translatable = ['title','price'];
    public function service() {
        return $this->belongsTo(Service::class);
    }
}
