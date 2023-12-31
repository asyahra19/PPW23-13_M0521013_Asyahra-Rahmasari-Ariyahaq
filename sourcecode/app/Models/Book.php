<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pegawai',
        'kode_pegawai',
        'jabatan',
        'foto',
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function borrower()
    {
        return $this->belongsToMany(Borrower::class);
    }
    
}
