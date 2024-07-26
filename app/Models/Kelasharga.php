<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelasharga extends Model
{
    use HasFactory;

    protected $table = 'kelas_harga';
    protected $guarded = ['id'];

    public function kelas(){
        return $this->hasMany(Kelas::class);
    }

}
