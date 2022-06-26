<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    //
    // リレーション 商品
    public function products(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Products');
    }
}
