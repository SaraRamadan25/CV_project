<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Education extends Model
{
    use HasFactory;
    protected $table='educations'; // maybe laravel don't treat educations as plural, so give it a name of the table
    protected $dates = ['duration'];

    protected $fillable=[
         'name' ,
        'duration',
        'description'
    ];
   /* protected static function boot()
    {
        parent::boot();

        static::created(function ($education) {
            $education->users()->attach(auth()->id());
        });
    }*/

    public function users(): belongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
