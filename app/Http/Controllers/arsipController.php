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
    public function tambah()
    {
        return view('surat.tambah');
    }
    public function simpan(Request $request)
    {
        $data = $request->validated();
        if($data):
            if(isset($request->id_arsip)):
                //proses update 
                $perintah = arsipModel::where('id_arsip',$request->id_arsip)->update($data);
                if($perintah):
                    $pesan = [
                        'status' => 'sucess',
                        'pesan' => 'Data surat berhasil diperbarui'
                    ];
                else:
                    $pesan = [
                        'status' => 'error ',
                        'pesan' => 'Data surat gagal diperbarui'
                    ];
                endif;
            else:
                //proses tambah data baru
                $dataBaru = arsipModel::create($data);
                if($dataBaru):
                    $pesan = [
                        'status' => 'sucess',
                        'pesan' => 'Data surat baru berhasil ditambahkan kedalam database'
                    ];
                else:
                    $pesan = [
                        'status' => 'error ',
                        'pesan' => 'Data surat gagal ditambahkan'
                    ];
                endif;
            endif;
        else:
            $pesan = [
                'status' => 'error ',
                'pesan' => 'Proses validasi gagal'
            ];
        endif;
        return response()->json($pesan);
    }
    public function update(Request $request)
    {
        $data = [
            'arsipDetil' => arsipModel::where('id_arsip',$request->id_arsip)->first()
        ];
        return view('arsip.edit',$data);
    }
    public function delete(Request $request)
    {
        $aksiHapus = arsipModel::where('id_arsip',$request->id_arsip)->delete();
        if($aksiHapus):
            $pesan = [
                'status' => 'sucess',
                'pesan' => 'Data berhasil dihapus'
            ];
        else:
            $pesan = [
                'status' => 'error ',
                'pesan' => 'Data gagal dihapus'
            ];
        endif;
        return response()->json($pesan);
    }
}
