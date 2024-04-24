<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Business extends Model
{
    use HasFactory;
    protected $fillable  = [
        'name',
        'industry',
        'expire_at',
        'plan_id',
        /*'user_id',
        'business_id',*/

    ];

    protected function casts():array
    {
        return [
            'expire_at' => 'datetime:Y-m-d',
        ];
    }

    public function users():BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function plan():BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }

}
