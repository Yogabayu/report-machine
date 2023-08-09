<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    use HasFactory;
    protected $fillable =[
        'provinsi_id','kota_id','kecamatan_id','desa_id','nama','alamat','foto'
    ];
}
