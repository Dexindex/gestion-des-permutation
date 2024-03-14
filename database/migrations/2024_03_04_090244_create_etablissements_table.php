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

        Schema::create('etablissements', function (Blueprint $table) {
            $table->id();
            $table->string('etablissement');
            $table->string('code');
            $table->string('adresse');
            $table->string('tel');
            $table->string('fax');
            $table->foreignId('ville_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etablissements');
    }
};
