<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainers', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('trainer_firstname');
            $table->string('trainer_lastname');
            $table->string('password');
            $table->string('trainer_phonenumber');
            $table->string('trainer_image')->default('');
            $table->string('trainer_address');
            $table->string('trainer_gender');
            $table->string('trainer_class');
            $table->string('image');
            $table->boolean('is_admin')->default(false);
            $table->rememberToken();
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
        Schema::dropIfExists('trainers');
    }
}
