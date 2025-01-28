<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertiTemplate extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'file_template'];

    public function certificates()
    {
        return $this->hasMany(Certificate::class, 'template_id');
    }
}
