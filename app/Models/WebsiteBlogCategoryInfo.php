<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteBlogCategoryInfo extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function child()
    {
        return $this->hasMany(WebsiteBlogCategoryInfo::class,'parent_id','id');
    }

    public function blogs()
    {
        return $this->hasMany(WebsiteBlogInfo::class,'category_id','id');
    }

}
