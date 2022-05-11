<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    //
    public function shop(): BelongsTo
    {
        return $this->belongsTo('App\Models\Shop');
    }
    // カテゴリーのリレーション作成
    public function category(): BelongsTo
    {
        return $this->belongsTo('App\Models\Category');
    }
}
