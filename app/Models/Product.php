<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
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
    public function getExpiredAtAttribute($value)
    {
         $expiredDate = mb_substr($value, 0, -3);
         $expiredDate = str_replace('-', '/', $expiredDate);
         return $expiredDate;
    }
}
