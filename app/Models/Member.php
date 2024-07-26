<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authhenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Member extends Authhenticatable
{
    use HasApiTokens, HasFactory, Notifiable; 

    protected $table = 'members';

    protected $guarded =['id'];

    public function kelas(){
        return $this->hasMany(Member::class);
    }
}
