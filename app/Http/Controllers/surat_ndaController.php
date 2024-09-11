<?php

namespace App\Http\Controllers;

use App\Models\surat_ndaModel;
use Illuminate\Http\Request;

class surat_ndaController extends Controller
{
    protected $id_surat_nda;
    protected $kode_surat;
    protected $isi_surat;
    protected $surat_ndaModel;

    //menampilkan seluruh daftar surat
    public function __construct()
    {
        $this->surat_ndaModel = new surat_ndaModel();
    }
    public function index()
    {
        $data = [
            'surat_nda' => surat_ndaModel::all()
        ];
        return view('surat_nda.index', $data);
    }
    public function generateNomorSurat()
    {
        // Nomor urut surat, biasanya bisa di-generate berdasarkan jumlah surat sebelumnya
        $nomorUrut = str_pad((int)$this->getLastNomorUrut() + 1, 3, '0', STR_PAD_LEFT);
        
        // Kode unit atau departemen
        $kodeUnit = "HRD"; // Sesuaikan dengan unit atau departemen
        
        // Bulan dalam format Romawi
        $bulan = $this->getMonthInRoman(date('n'));
        
        // Tahun saat ini
        $tahun = date('Y');

        // Format nomor surat
        return "$nomorUrut/$kodeUnit/$bulan/$tahun";
    }

    // Fungsi untuk mendapatkan bulan dalam format Romawi
    private function getMonthInRoman($month)
    {
        $romanMonths = ["I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII"];
        return $romanMonths[$month - 1];
    }

    // Fungsi untuk mendapatkan nomor urut terakhir
    private function getLastNomorUrut()
    {
        // Contoh pengambilan nomor urut terakhir dari database
        // Sesuaikan dengan model dan logika database yang kamu gunakan
        $lastSurat = surat_ndaModel::orderBy('id', 'desc')->first();
        
        if ($lastSurat) {
            // Asumsikan nomor surat terakhir memiliki format "001/HRD/VIII/2024"
            $parts = explode('/', $lastSurat->nomor_surat);
            return (int)$parts[0];
        } else {
            return 0;
        }
    }

    // Fungsi untuk menyimpan surat baru
    public function store(Request $request)
    {
        // Generate nomor surat otomatis
        $nomorSurat = $this->generateNomorSurat();

        // Simpan surat dengan nomor surat
        $surat = new surat_ndaModel;
        $surat->nomor_surat = $nomorSurat;
        $surat->judul = $request->judul;
        $surat->isi = $request->isi;
        $surat->save();

        // Redirect atau kembalikan respons sesuai kebutuhan
        return redirect()->route('surat.index')->with('success', 'Surat berhasil disimpan dengan nomor: ' . $nomorSurat);
    }
}
