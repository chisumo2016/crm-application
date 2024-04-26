<?php

namespace App\Models;

use App\Models\Scopes\BusinessScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;

#[ScopedBy([BusinessScope::class])]
class Role extends Model
{
    use HasFactory;
    protected $fillable  = [
        'name',
        'business_id',

    ];

    public function permissions():BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }
}
