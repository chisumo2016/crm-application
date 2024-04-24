<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'interval',
        'trial_period_days',
    ];

    public function permissions():BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }


}
