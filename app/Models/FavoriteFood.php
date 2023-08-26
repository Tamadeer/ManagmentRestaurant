<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class FavoriteFood extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    public function ordre():BelongsToMany
    {
        return $this->belongsToMany(Order::class,'order_favorite_food');
    }
}
