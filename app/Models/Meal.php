<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meal extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    public function orders():BelongsToMany
    {
        return $this->belongsToMany(Order::class,'order_meal');
    }

    public function components():BelongsToMany
    {
        return $this->belongsToMany(Component::class,'component_meal');
    }
}
