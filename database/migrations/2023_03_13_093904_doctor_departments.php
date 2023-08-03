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
        Schema::create('doctor_departments', function (Blueprint $table) {
            $table->uuid('id')->primary();
			
			$table->uuid('departman_id')->nullable(false);
			$table->foreign('departman_id')->references('id')->on('departments');
			
			$table->uuid('doctor_id')->nullable(false);
			$table->foreign('doctor_id')->references('id')->on('doctors');
			
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
        Schema::drop('doctor_departments');
    }
};
