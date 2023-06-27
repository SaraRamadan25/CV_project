<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $casts =[
        'speeches'=>'array',
        'expert_in'=>'array',
        'email_verified_at' => 'datetime',
    ];
    protected $fillable = [
        'name',
        'email',
        'password',
        'date_of_birth',
        'expert_in',
        'freelance',
        'description',
        'excerpt',
        'speeches',
        'image',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getFreelanceAttribute($value)
    {
        if ($value==1) {
            return 'available';
        } else {
            return 'not available';
        }

    }



    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class);
    }
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }
    public function testimonials(): HasMany
    {
        return $this->hasMany(Testimonial::class);
    }
    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }
    public function educations(): belongsToMany
    {
        return $this->belongsToMany(Education::class);
    }
    public function experiences(): belongsToMany
    {
        return $this->belongsToMany(Experience::class);
    }

    public function canAccessFilament(): bool
    {
        return str_ends_with($this->email, 'admin.com') ;
    }
}
