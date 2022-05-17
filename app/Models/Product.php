<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function stocks(): HasMany
    {
        return $this->hasMany('App\Models\Stock');
    }

    public function stockQuantity()
    {
        $total = $this->stocks->sum('quantity');
        return $total;
    }
}
