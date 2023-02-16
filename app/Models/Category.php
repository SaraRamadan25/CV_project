<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable=['name'];
    use HasFactory;
    public function projects() :HasMany
    {
        return $this->hasMany(Project::class);
    }
    public function getRouteKey(): string
    {
        return 'name';
    }
}
