<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\LoginSecurity;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Filament\Models\Contracts\FilamentUser;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function links(){
        return $this->hasMany(Link::class);
    }

    public function loginSecurity()
    {
        return $this->hasOne(LoginSecurity::class);
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function isAdmin(): bool{
        return $this->role()->where('name', 'admin')->exists();
    }

    public function hasRole($name): bool{
        return $this->role()->where('name', $name)->exists();
    }

    public function canAccessFilament(): bool{
        return $this->isAdmin();
    }
}
