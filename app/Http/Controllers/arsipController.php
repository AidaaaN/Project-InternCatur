<?php

namespace App\Http\Controllers;

use App\Models\arsipModel;
use Illuminate\Http\Request;

class arsipController extends Controller
{
    protected $id_arsip;
    protected $nama_surat;
    protected $tanggal_arsip;
    protected $arsipModel;

    //menampilkan seluruh daftar surat
    public function __construct()
    {
        $this->arsipModel  = new arsipModel();
    }
    public function index()
    {
        $data = [
            'arsip' => arsipModel::all()
        ];
        return view('arsip.index', $data);
    }
}
