<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'account_status',
        'is_resident_verified',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_resident_verified' => 'boolean',
            'last_login_at' => 'datetime',
        ];
    }

    public function residentProfile(): HasOne
    {
        return $this->hasOne(ResidentProfile::class);
    }

    public function officialProfile(): HasOne
    {
        return $this->hasOne(OfficialProfile::class);
    }

    public function isResident(): bool
    {
        return $this->role === 'resident';
    }

    public function isBarangayOfficial(): bool
    {
        return $this->role === 'barangay_official';
    }

    public function isCitySuperAdmin(): bool
    {
        return $this->role === 'city_super_admin';
    }
}
