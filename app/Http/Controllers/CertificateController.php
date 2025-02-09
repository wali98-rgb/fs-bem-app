<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\CertiTemplate;
use App\Imports\ParticipantImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use setasign\Fpdi\Fpdi;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    public function index()
    {
        $templates = CertiTemplate::all();
        $certificates = Certificate::all();

        return view('admin.pages.certificates.index', [
            'certificates' => $certificates,
            'templates' => $templates
        ]);
    }
    public function create()
    {
        $templates = CertiTemplate::all();

        return view('admin.pages.certificates.create.creates', [
            'templates' => $templates
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'no_certi' => 'required|unique:certificates,no_certi|max:255',
            'nama' => 'required|max:255',
            'kategori_sebagai' => 'required|max:255',
            'nama_kegiatan' => 'required|max:255',
            'tema_kegiatan' => 'required|max:255',
            'template_id' => 'required|exists:certi_templates,id',
        ]);

        $template = CertiTemplate::findOrFail($validatedData['template_id']);

        $certificate = Certificate::create([
            'no_certi' => $validatedData['no_certi'],
            'nama' => $validatedData['nama'],
            'kategori_sebagai' => $validatedData['kategori_sebagai'],
            'nama_kegiatan' => $validatedData['nama_kegiatan'],
            'tema_kegiatan' => $validatedData['tema_kegiatan'],
            'template_id' => $template->id,
        ]);

        $this->generateCertificatePDF($template, $certificate);

        return redirect()->route('certificate.index')
            ->with('success', 'Sertifikat berhasil dibuat dan PDF telah digenerate.');
    }

    public function upload(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'file_template' => 'required|file|mimes:pdf|max:5120',
        ]);

        $template = new CertiTemplate();
        $template->nama = $validatedData['nama'];

        if ($request->hasFile('file_template')) {
            $file = $request->file('file_template');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('files/certificate_templates'), $fileName);

            $template->file_template = 'files/certificate_templates/' . $fileName;
        }

        $template->save();

        return redirect()->route('certificate.index')
            ->with('success', 'Template Sertifikat Berhasil Ditambahkan');
    }

    public function generateBulkCertificates(Request $request)
    {
        $validatedData = $request->validate([
            'template_id' => 'required|exists:certi_templates,id',
            'peserta_file' => 'required|file|mimes:xlsx,xls',
        ]);

        $template = CertiTemplate::findOrFail($validatedData['template_id']);
        $certificates = Excel::toArray(new ParticipantImport, $request->file('peserta_file'));

        foreach ($certificates[0] as $row) {
            if ($row['no'] && $row['nama'] && $row['kategori'] && $row['nama_kegiatan'] && $row['tema_kegiatan']) {
                $certificate = Certificate::create([
                    'no_certi' => $row['no'],
                    'nama' => $row['nama'],
                    'kategori_sebagai' => $row['kategori'],
                    'nama_kegiatan' => $row['nama_kegiatan'],
                    'tema_kegiatan' => $row['tema_kegiatan'],
                    'template_id' => $template->id,
                ]);

                $this->generateCertificatePDF($template, $certificate);
            }
        }

        return redirect()->route('certificate.index')
            ->with('success', 'Sertifikat Berhasil Digenerate');
    }

    private function generateCertificatePDF($template, $certificate)
    {
        try {
            $pdf = new Fpdi();
            $pdf->AddPage('L');
            $pdf->setSourceFile($template->file_template);
            $tplIdx = $pdf->importPage(1);
            $pdf->useTemplate($tplIdx);

            $pdf->SetFont('helvetica', 'BI', 16);
            $pdf->SetTextColor(0,0,0);

            $positions = [
                'no_certi' => [117, 60],       // Lebih tinggi di tengah
                'nama' => [123, 95],          // Nama tepat di tengah baris kedua
                'kategori_sebagai' => [138, 112], // Baris ketiga
                'nama_kegiatan' => [135, 120], // Baris keempat
                'tema_kegiatan' => [90, 127], // Baris kelima
            ];

            foreach ($positions as $field => $position) {
                // Periksa apakah field adalah 'nama'
                if ($field === 'nama') {
                    $pdf->SetFont('times', 'BI', 28); // Font lebih besar untuk nama

                    // Hitung lebar teks nama
                    $textWidth = $pdf->GetStringWidth($certificate->$field);

                    // Hitung posisi X agar teks nama berada di tengah
                    $centerX = ($pdf->GetPageWidth() / 2) - ($textWidth / 2);

                    // Set posisi untuk nama (berdasarkan hitungan dinamis)
                    $pdf->SetXY($centerX, $position[1]);
                } else {
                    $pdf->SetFont('helvetica', '', 16); // Font default untuk field lain

                    // Set posisi default
                    $pdf->SetXY($position[0], $position[1]);
                }

                // Tulis teks ke PDF
                $pdf->Write(0, $certificate->$field);
            }


            $outputFile = public_path('files/certificate_file/' . $certificate->nama . '_certificate.pdf');

            if (!File::exists(dirname($outputFile))) {
                File::makeDirectory(dirname($outputFile), 0755, true);
            }

            $pdf->Output($outputFile, 'F');

            $certificate->update([
                'file_path' => 'files/certificate_file/' . $certificate->nama . '_certificate.pdf',
            ]);

            return true;
        } catch (\Exception $e) {
            \Log::error('Certificate PDF Generation Error: ' . $e->getMessage());
            return false;
        }
    }
    public function destroy(Certificate $certificate)
    {
        $certificate->findOrFail($certificate->id)->delete();
        return redirect()->route('certificate.index')
            ->with('success', 'Sertifikat berhasil dihapus.');
    }
}
