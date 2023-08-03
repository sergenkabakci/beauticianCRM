<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Patients extends Model
{
    use HasFactory,Uuid;
	
	
	 protected $fillable = [
        'ad',
        'soyad',
        'email',
        'telefon',
		'tcno',
		'grup',
        'adres',
        'cinsiyet',
        'user_id',
        'tenant_id'
	
    ];
	
}
