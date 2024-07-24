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
        Schema::create('listdetailbarang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('area_id')->constrained()->onDelete('cascade');
            $table->foreignId('listbarang_id')->constrained('listbarangs')->onDelete('cascade');
            $table->string('nostt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listdetailbarang');
    }
};
