<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkshopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workshops', function (Blueprint $table) {
            $table->id();

            $table->string('description');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->bigInteger('professor_id')->unsigned()->index();
            $table->bigInteger('administrator_id')->unsigned()->index();
            $table->bigInteger('scholar_group_id')->unsigned()->index();
            $table->bigInteger('laboratory_id')->unsigned()->index();
            

            $table->foreign('professor_id')->references('id')->on('users');
            $table->foreign('administrator_id')->references('id')->on('users');
            $table->foreign('scholar_group_id')->references('id')->on('scholar_groups');
            $table->foreign('laboratory_id')->references('id')->on('laboratories');


            $table->timestamps();
        });

         Schema::create('user_workshop', function (Blueprint $table) {
            $table->id();

            $table->string('description');
            $table->dateTime('checked_in_at')->nullable();
            $table->dateTime('checked_out_at')->nullable();
            $table->bigInteger('student_id')->unsigned()->index();
            $table->bigInteger('workshop_id')->unsigned()->index();


            $table->foreign('student_id')->references('id')->on('users');
            $table->foreign('workshop_id')->references('id')->on('workshops');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_workshop');
        Schema::dropIfExists('workshops');
    }
}
