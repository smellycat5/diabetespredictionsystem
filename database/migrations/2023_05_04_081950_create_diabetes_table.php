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
        Schema::create('diabetes', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('pregnancies');
            $table->integer('glucose');
            $table->integer('blood_pressure');
            $table->integer('skin_thickness');
            $table->integer('insulin');
            $table->integer('BMI');
            $table->float('diabetes_pedigree_function', 8, 3);
            $table->integer('age');
            $table->boolean('Outcome')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diabetes');
    }
};
