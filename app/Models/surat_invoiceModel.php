<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surat_invoiceModel extends Model
{
    use HasFactory;
    protected $table ='surat_invoice';
    protected $primaryKey ='id_surat_invoice';
    protected $fillable = ['kode_surat','isi_surat'];
    
}
