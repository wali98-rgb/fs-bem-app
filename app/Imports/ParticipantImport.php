<?php

namespace App\Imports;

use App\Models\Certificate;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ParticipantImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Certificate([
            'no_certi' => $row['no'], // Key sesuai dengan header Excel
            'nama' => $row['nama'],
            'kategori_sebagai' => $row['kategori'],
            'nama_kegiatan' => $row['nama_kegiatan'],
            'tema_kegiatan' => $row['tema_kegiatan'],
        ]);
    }
}
