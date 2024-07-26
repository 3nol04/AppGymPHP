<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    
    protected $fillable = [
        'price',
        'description',
        'kuota',
        'harga',
        'harga_id',
        'id_instruktor',
        'id_jadwal',
        'member_id',
    ];

    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'id_instruktor');
    }
    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'id_jadwal');
    }
    public function hargakelas()
    {
        return $this->belongsTo(Kelasharga::class,'harga_id');
    }
    public function member()
    {
        return $this->belongsTo(Member::class,'member_id');
    }
}
