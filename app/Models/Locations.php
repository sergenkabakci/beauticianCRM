<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
class Locations extends Model
{
    use HasFactory, Uuid;
	//protected $table  = "locations";

	
    protected $fillable = [
        'lokasyon',
        'adres',
        'status',
        'tenant_id',
    ];
	
}
