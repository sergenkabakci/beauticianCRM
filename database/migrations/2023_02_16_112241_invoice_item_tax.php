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
		Schema::create('invoice_item_tax', function (Blueprint $table) {
            $table->uuid('id')->primary();
			
			$table->string('taxname', 100);
			$table->decimal('taxrate', 14, 4);
			
		
			$table->uuid('item_id');
			$table->foreign('item_id')->references('id')->on('invoice_item');
			
			$table->uuid('invoice_id');
			$table->foreign('invoice_id')->references('id')->on('invoices');
			$table->timestamps();
        });
			
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('invoice_item_tax');
    }
};
