<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    public function Permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class,'role_permission');
    }
    public function users(){
        return $this->belongsToMany(User::class,'user_role');
    }
}
