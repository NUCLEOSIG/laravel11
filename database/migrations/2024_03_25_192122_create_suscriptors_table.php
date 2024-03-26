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
        Schema::create('suscriptors', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('email');
            $table->bigInteger('telefono')->default(0);
            $table->text('suscrito');
            $table->text('canales');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suscriptors');
    }
};
