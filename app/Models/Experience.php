<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Experience extends Model
{
    use HasFactory;


    protected $fillable=[
        'name',
        'duration',
        'description',
        'user_id'
    ];
    public function users(): belongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
