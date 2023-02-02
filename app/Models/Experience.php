<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Experience extends Model
{
    protected $fillable=[
        'name',
        'duration',
        'experience'
    ];
    use HasFactory;
    public function users(): belongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
