<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'description',
        'role',
        'image',
        'user_id'
    ];
    public function user() :BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

}
