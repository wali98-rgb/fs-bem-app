<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $table = 'files';
    protected $primaryKey = 'id_berkas';
    protected $fillable = ['file_berkas', 'tipe_berkas', 'nama_berkas', 'url_berkas', 'tanggal_acara', 'proker_id', 'user_id'];


    public function proker()
    {
        return $this->belongsTo(Proker::class, 'proker_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
