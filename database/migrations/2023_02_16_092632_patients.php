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
          Schema::create('patients', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('ad');
            $table->string('soyad');
            $table->string('email')->nullable();
            $table->string('telefon');
            $table->string('tcno')->nullable();
            $table->integer('grup')->nullable();
            $table->text('adres')->nullable();
			$table->enum('cinsiyet', ['Kadın', 'Erkek'])->nullable();
			
			$table->uuid('user_id')->nullable(false);
			$table->foreign('user_id')->references('id')->on('users');
			
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
        Schema::drop('patients');
    }
};
