<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Department;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'photo',
        'name',
        'email',
        'password',
        'gender',
        'role',
        'dept_id',
        'prodi_id',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'dept_id');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }

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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected function type(): Attribute
    {
        return new Attribute(
            get: fn($value) =>  ["superadmin", "admin", "bem"][$value],
        );
    }

    /**
     * Scope a query to filter users by roles excluding 'superadmin'.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param array $roles
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithRoles(Builder $query, array $roles)
    {
        // Algoritma untuk menampilkan user dengan role tertentu menggunakan metode many-to-many
        // return $query->whereHas('role', function ($query) use ($roles) {
        //     $query->whereIn('name', $roles)
        //         ->where('name', '!=', 'superadmin');
        // });

        // Kolom role yang berada pada table users
        return $query->whereIn('role', $roles)
            ->where('role', '!=', 'superadmin');
    }
}
