<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
        
        Schema::create('calorific_values', function (Blueprint $table) {
            $table->id();
            $table->float('value', 6, 2);
            $table->date('applicable_for');
            $table->foreignId('location_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calorific_values');
        Schema::dropIfExists('locations');
    }
};
