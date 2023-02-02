<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    protected $fillable=[
      'name',
        'image',
        'user_id',
        'type',
        'category_id'
    ];
    use HasFactory;
public function user() :BelongsTo
{
    return $this->belongsTo(User::class);
}
public function category(): BelongsTo
{
    return $this->belongsTo(Category::class);
}
}
