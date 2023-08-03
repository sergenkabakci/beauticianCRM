<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
class Event_categories extends Model
{
	use HasFactory, Uuid;
	
	protected $fillable = [
        'name', 
		'order', 
		'status',
		'status',
		'color',
		'tenant_id'
    ];
}
