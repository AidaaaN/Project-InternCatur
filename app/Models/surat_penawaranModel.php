<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surat_penawaranModel extends Model
{
    use HasFactory;
    protected $table='surat_penawaran';
    protected $primaryKey ='id_suratPenawaran';
    protected $fillable = ['kode_surat','isi_surat'];
    
}
