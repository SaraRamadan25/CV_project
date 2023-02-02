<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Education extends Model
{
    protected $fillable=[
         'name' ,
        'duration',
        'description'
    ];
    use HasFactory;
    public function users(): belongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
