<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $table = 'prodis';
    protected $fillable = ['name_prodi', 'level'];

    protected function user()
    {
        return $this->hasMany(User::class);
    }
}
