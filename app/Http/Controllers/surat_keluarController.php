<?php

namespace App\Http\Controllers;

use App\Models\surat_keluarModel;
use Illuminate\Http\Request;

class surat_keluarController extends Controller
{
    protected $id_surat_keluar;
    protected $nama_surat;
    protected $tanggal_keluar;
    protected $surat_keluarModel;

    //menampilkan seluruh daftar surat
    public function __construct()
    {
        $this->surat_keluarModel = new surat_keluarModel();
    }
    public function index()
    {
        $data = [
            'surat_keluar' => surat_keluarModel::all()
        ];
        return view('surat_keluar.index', $data);
    }
}
