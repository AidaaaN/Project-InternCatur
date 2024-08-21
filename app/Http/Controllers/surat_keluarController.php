<?php

namespace App\Http\Controllers;

use App\Models\surat_keluarModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

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
       
        return view('suratkeluar.index');
    }
    public function dataSuratKeluar(Request $request)
    {
        if($request->ajax()){
            $data=$this->surat_keluarModel->get();
            return DataTables::of($data)->toJson(); 
        }
    }
}
