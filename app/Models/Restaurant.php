<?php

namespace App\Models;

use App\Http\Controllers\TableController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'address_id'

    ];
    public function address(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {

        return $this->belongsTo(Address::class);
    }
    public function tables(){
        return $this->hasMany(Table::class);
    }
    public function users(){
        return $this->belongsToMany(User::class,'user_restaurant');
    }
    public function category(){
        return  $this->belongsToMany(Category::class,'restaurant_category');
    }
    public function coupons(){
        return $this->hasMany(Coupon::class);
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }

}
