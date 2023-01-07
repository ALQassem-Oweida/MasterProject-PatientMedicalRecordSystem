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
        Schema::create('user_infos', function (Blueprint $table) {
            $table->id();
            $table->string('national_id')->unique();
            $table->string('FName');
            $table->string('MName');
            $table->string('LName');
            $table->date('date_of_birth');
            $table->string('address');
            $table->foreignId('user_info_relation')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('user_infos');
    }
};
