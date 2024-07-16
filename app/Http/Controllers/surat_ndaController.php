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
}
