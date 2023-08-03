<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
class Events extends Model
{
    use HasFactory, Uuid;
	
	protected $fillable = [
        'baslik', 
		'aciklama', 
		'baslangic_tarihi',
		'bitis_tarihi',
		'bitis_tarihi',
		'kategori_id',
		'lokasyon_id',
		'user_id',
		'tenant_id',
    ];
}
