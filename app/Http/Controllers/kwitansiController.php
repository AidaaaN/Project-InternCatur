<?php

namespace App\Http\Controllers;

use App\Models\kwitansiModel;
use Illuminate\Http\Request;

class kwitansiController extends Controller
{
    protected $id_kwitansi;
    protected $nama_penerima;
    protected $nominal;
    protected $tanggal_kwitansi;
    protected $keterangan;
    protected $kwitansiModel;

    //menampilkan seluruh daftar surat
    public function __construct()
    {
        $this->kwitansiModel = new kwitansiModel();
    }
    public function index()
    {
        $data = [
            'kwitansi' => kwitansiModel::all()
        ];
        return view('kwitansi.index', $data);
    }
}
