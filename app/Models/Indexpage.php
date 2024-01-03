<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Indexpage extends Model
{
    use HasFactory;
    use Translatable;
    protected $translatable = ['head_title', 'head_subtitle', 'stat_title', 'stat1_num', 'stat2_num', 'stat3_num', 'stat1_subtitle', 'stat2_subtitle', 'stat3_subtitle', 'foot_title', 'foot_main'];
}
