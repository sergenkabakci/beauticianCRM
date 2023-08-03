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
        Schema::create('doctors', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('ad');
            $table->string('soyad');
            $table->string('email')->nullable();
            $table->string('telefon')->nullable();
            $table->tinyInteger('status')->default('1');
			$table->enum('cinsiyet', ['Kadın', 'Erkek'])->nullable();
			
			
			
			
			
			$table->uuid('tenant_id')->nullable(false);
			$table->foreign('tenant_id')->references('id')->on('tenants');
			
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('doctors');
    }
};
