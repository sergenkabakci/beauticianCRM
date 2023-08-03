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
		Schema::create('invoices', function (Blueprint $table) {
            $table->uuid('id')->primary();
			$table->string('invoice_number', 50);
			$table->date('date');
			$table->date('due_date');
			$table->decimal('subtotal', 14, 4);
			$table->decimal('total_tax', 14, 4);
			$table->decimal('total', 14, 4);
			$table->tinyInteger('status')->default(0);
			
			
			
			$table->text('note')->nullable();
			
			$table->uuid('patient_id')->nullable(false);
			$table->foreign('patient_id')->references('id')->on('patients');
			
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
        Schema::drop('invoices');
    }
};
