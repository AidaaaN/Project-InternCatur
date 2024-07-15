<?php

namespace App\Http\Controllers;

use App\Models\surat_masukModel;
use Illuminate\Http\Request;

class surat_masukController extends Controller
{
    protected $id_surat_masuk;
    protected $nama_surat;
    protected $tanggal_masuk;
    protected $surat_masukModel;

    //menampilkan seluruh daftar surat
    public function __construct()
    {
        $this->surat_masukModel = new surat_masukModel();
    }
    public function index()
    {
        $data = [
            'surat_masuk' => surat_masukModel::all()
        ];
        return view('surat_masuk.index', $data);
    }
}
