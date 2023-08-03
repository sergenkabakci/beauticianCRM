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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
           
            $table->string('ad');
            $table->string('soyad');
            $table->string('email')->unique();
			$table->string('username')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
			$table->tinyInteger('status')->default('1');
			
			
			$table->uuid('tenant_id')->nullable(false);
			$table->foreign('tenant_id')->references('id')->on('tenants');
            $table->rememberToken();
            $table->timestamps();
        });
		
		
		
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
