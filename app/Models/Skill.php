<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Skill extends Model
{
    protected $fillable=[
        'name',
        'percentage',
        'user_id'
    ];
    use HasFactory;
    public function user() :BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
}
