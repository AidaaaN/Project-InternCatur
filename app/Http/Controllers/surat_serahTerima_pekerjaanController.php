<?php

namespace App\Http\Controllers;

use App\Models\surat_serahTerima_pekerjaanModel;
use Illuminate\Http\Request;

class surat_serahTerima_pekerjaan extends Controller
{
    protected $id_surat_serahTerima_pekerjaan;
    protected $kode_surat;
    protected $isi_surat;
    protected $surat_serahTerima_pekerjaanModel;

    //menampilkan seluruh daftar surat
    public function __construct()
    {
        $this->surat_serahTerima_pekerjaanModel = new surat_serahTerima_pekerjaanModel();
    }
    public function index()
    {
        $data = [
            'surat_serahTerima_pekerjaan' => surat_serahTerima_pekerjaanModel::all()
        ];
        return view('surat_serahTerima_pekerjaan.index', $data);
    }
}
