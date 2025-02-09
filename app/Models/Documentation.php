<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentation extends Model
{
    use HasFactory;

    protected $table = 'documentations';
    protected $guarded = [];

    public function proker()
    {
        return $this->belongsTo(Proker::class, 'proker_id');
    }
}
