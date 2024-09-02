<?php

namespace App\Http\Controllers;

use App\Http\Requests\arsipRequest;
use App\Models\arsipModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

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

        return view('arsip.index');
    }
    public function tambah()
    {
        return view('surat.tambah');
    }
    public function simpan(Request $request) 
    {

    }
    public function update(Request $request) 
    {

    }
    public function delete(Request $request) 
    {

    }
    public function dataArsip(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->arsipModel->get();

            return DataTables::of($data)->toJson();
            /*->addColumn('action', function ($arsip) {
                    $editUrl = route('arsip.edit', $arsip->id_arsip);
                    $deleteUrl = route('arsip.destroy', $arsip->id_arsip);

                    return '<a href="' . $editUrl . '" class="btn btn-primary editBtn" data-bs-toggle="modal" data-bs-target="#modalForm">Edit</a>  <button type="button" class="btn btn-danger btnHapusArsip" data-id="' . $deleteUrl . '">Hapus</button>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return abort(404);*/
        }
    }
}
