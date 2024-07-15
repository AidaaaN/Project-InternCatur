<?php

namespace App\Http\Controllers;

use App\Models\surat_invoiceModel;
use Illuminate\Http\Request;

class surat_invoiceController extends Controller
{
    protected $id_surat_invoice;
    protected $kode_surat;
    protected $isi_surat;
    protected $surat_invoiceModel;

    //menampilkan seluruh daftar surat
    public function __construct()
    {
        $this->surat_invoiceModel = new surat_invoiceModel();
    }
    public function index()
    {
        $data = [
            'surat_invoice' => surat_invoiceModel::all()
        ];
        return view('surat_invoice.index', $data);
    }
}
