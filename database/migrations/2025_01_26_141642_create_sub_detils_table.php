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
        Schema::create('sub_detils', function (Blueprint $table) {
            $table->id();
            $table->string('sub_detil');
            $table->foreign('detil_id')->references('id')->on('detils');
            $table->string('volume_output');
            $table->string('quantity');
            $table->string('satuan');
            $table->string('harga_satuan');
            $table->string('jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_detils');
    }
};
