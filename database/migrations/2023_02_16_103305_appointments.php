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
        Schema::create('appointments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('aciklama')->nullable();
			$table->dateTime('tarih', $precision = 0);
			$table->tinyInteger('reminder')->default('0');
			
			
			
			$table->uuid('islem_id')->nullable(false);
			$table->foreign('islem_id')->references('id')->on('appointment_categories');

			$table->uuid('patient_id')->nullable(false);
			$table->foreign('patient_id')->references('id')->on('patients');
			
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
        Schema::drop('appointments');
    }
};
