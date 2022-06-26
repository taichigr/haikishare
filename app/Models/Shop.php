<?php

namespace App\Models;

use App\Notifications\ShopPasswordResetNotification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Shop extends Authenticatable
{
    //
    use SoftDeletes;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guard = 'shop';

    protected $fillable = [
        'name',
        'branch_name',
        'email',
        'prefecture_id',
        'address',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // リレーション 都道府県
    public function prefecture(): BelongsTo
    {
        return $this->belongsTo('App\Models\Prefecture');
    }

    // リレーション 商品
    public function products(): HasMany
    {
        return $this->hasMany("App\Models\Product");
    }

    // コンビニ側のパスワードリセット通知
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ShopPasswordResetNotification($token));
    }
}
