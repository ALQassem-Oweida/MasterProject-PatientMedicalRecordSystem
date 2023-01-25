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
        Schema::create('medical_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('event_type');
            $table->date('event_date');
            $table->string('event_description');
            $table->string('medication_name')->nullable();
            $table->string('dosage')->nullable();
            $table->string('frequency')->nullable();
            $table->string('allergy')->nullable();
            $table->foreignId('add_by')->nullable()->references('id')->on('users')->onDelete('cascade');;
            $table->foreignId('Edited_by')->nullable()->references('id')->on('users')->onDelete('cascade');;

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
        Schema::dropIfExists('medical_histories');
    }
};
