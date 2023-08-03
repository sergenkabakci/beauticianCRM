<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
         Schema::create('tenants', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('firma');
			$table->tinyInteger('status')->default('1');
            $table->rememberToken();
            $table->timestamps();
        });
		
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
