<?php

namespace App\Http\Controllers;

use App\Models\surat_penawaranModel;
use Illuminate\Http\Request;

class surat_penawaranController extends Controller
{
    protected $id_surat_penawaran;
    protected $kode_surat;
    protected $isi_surat;
    protected $surat_penawaranModel;

    //menampilkan seluruh daftar surat
    public function __construct()
    {
        $this->surat_penawaranModel = new surat_penawaranModel();
    }
    public function index()
    {
        $data = [
            'surat_penawaran' => surat_penawaranModel::all()
        ];
        return view('surat_penawaran.index', $data);
    }
}
