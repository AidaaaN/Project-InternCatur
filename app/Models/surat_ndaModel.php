<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surat_ndaModel extends Model
{
    use HasFactory;
    protected $table = 'surat_nda';
    protected $primaryKey = 'id_surat_nda';
    protected $fillable = ['kode_surat','isi_surat'];
    
}
