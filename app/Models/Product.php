<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    //
    // リレーション コンビニ店舗
    public function shop(): BelongsTo
    {
        return $this->belongsTo('App\Models\Shop');
    }
    // リレーション カレゴリー
    public function category(): BelongsTo
    {
        return $this->belongsTo('App\Models\Category');
    }
}
