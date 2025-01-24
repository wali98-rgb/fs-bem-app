<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_certi',
        'nama',
        'kategori_sebagai',
        'nama_kegiatan',
        'tema_kegiatan',
        'template_id',
        'file_path'
    ];

    public function template()
    {
        return $this->belongsTo(CertiTemplate::class, 'template_id');
    }
}
