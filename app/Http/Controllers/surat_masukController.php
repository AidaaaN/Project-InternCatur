<?php

namespace App\Http\Controllers;

use App\Models\surat_masukModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

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
        
        return view('suratmasuk.index');
    }
    
    public function tambah()
    {
        return view('suratmasuk.tambah');
    }

    public function dataSuratMsk(Request $request)
    {
        if($request->ajax()){
            $data = $this->surat_masukModel->get();
            return DataTables::of($data)->toJson();
        }
    }
}
