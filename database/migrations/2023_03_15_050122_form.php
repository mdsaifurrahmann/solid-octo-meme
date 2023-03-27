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
        Schema::create('form', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->integer('roll');
            $table->integer('student_id');
            $table->string('dob');
            $table->string('fathers_name');
            $table->string('mothers_name');
            $table->string('department');
            $table->string('semester');
            $table->string('blood');
            $table->string('country');
            $table->json('language');
            $table->string('phone');
            $table->string('email');
            $table->string('gender');
            $table->json('hobby');
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
        Schema::dropIfExists('form');
    }
};
