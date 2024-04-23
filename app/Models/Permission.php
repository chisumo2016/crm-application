<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends Model
{
    use HasFactory;
    protected $fillable  = [
        'name',
        /*'permission_id',
        'role_id',
        'plan_id',*/
    ];

    public function roles():BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function plans():BelongsToMany
    {
        return $this->belongsToMany(Plan::class);
    }
}
