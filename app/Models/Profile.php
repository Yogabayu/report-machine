<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'cabang_id',
        'nama',
        'level',
        'status',
        'alamat',
        'umur',
        'pendidikan',
        'jenis_kelamin',
        'telp',
        'mariage',
        'foto',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
