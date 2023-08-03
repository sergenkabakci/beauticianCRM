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
        Schema::create('events', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('baslik');
            $table->text('aciklama')->nullable();
			$table->dateTime('baslangic_tarihi', $precision = 0);
			$table->dateTime('bitis_tarihi', $precision = 0);

			$table->uuid('kategori_id')->nullable(false);	
			$table->foreign('kategori_id')->references('id')->on('event_categories');
			
			$table->uuid('lokasyon_id')->nullable(false);	
			$table->foreign('lokasyon_id')->references('id')->on('locations');
			
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
        Schema::drop('events');
    }
};
