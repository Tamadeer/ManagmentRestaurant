<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'parent_id',

    ];
    public function category(){
        $this->belongsTo(Category::class);
    }
    public function restaurant(){
        $this->belongsToMany(Restaurant::class,'restaurant_category');
    }
    public function meals(){
        $this->hasMany(Meal::class);
    }


}
