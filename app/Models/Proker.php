<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proker extends Model
{
    use HasFactory;

    protected $table = 'prokers';
    protected $fillable = ['proker', 'desc_proker', 'dept_id'];

    public function department()
    {
        return $this->belongsTo(Department::class, 'dept_id');
    }
}
