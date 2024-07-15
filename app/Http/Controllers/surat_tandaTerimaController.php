<?php

namespace App\Http\Controllers;

use App\Models\surat_tandaTerimaModel;
use Illuminate\Http\Request;

class surat_tandaTerimaController extends Controller
{
    protected $id_surat_tandaTerima_pekerjaan;
    protected $kode_surat;
    protected $isi_surat;
    protected $surat_tandaTerimaModel;

    //menampilkan seluruh daftar surat
    public function __construct()
    {
        $this->surat_tandaTerimaModel  = new surat_tandaTerimaModel();
    }
    public function index()
    {
        $data = [
            'surat_serahTerima' => surat_tandaTerimaModel::all()
        ];
        return view('surat_serahTerima.index', $data);
    }
}
