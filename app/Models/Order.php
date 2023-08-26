<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    public function meals():BelongsToMany
    {
        return $this->belongsToMany(Meal::class,'order_meal');
    }
    public function name_meal()
    {
        $names=[];
        $ord=Order::all();

        foreach ($ord as $or)
            foreach($or as $ors)
               $names=append($ors->meals->name);
        return $names;
    }
    public function restaurant():BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }
}
