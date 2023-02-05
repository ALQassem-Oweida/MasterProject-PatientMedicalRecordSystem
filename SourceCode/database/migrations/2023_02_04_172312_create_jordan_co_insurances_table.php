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
        Schema::create('jordan_co_insurances', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('insurance_type');
            $table->string('website');
            $table->string('address');
            $table->string('phone');
            $table->bigInteger('foundation_year');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jordan_co_insurances');
    }
};
