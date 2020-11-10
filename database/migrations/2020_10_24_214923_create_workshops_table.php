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

            $table->dateTime('checked_in_at')->nullable();
            $table->dateTime('checked_out_at')->nullable();

           
            $table->bigInteger('user_id')->unsigned()->index();
            $table->bigInteger('administrator_id')->unsigned()->index();
            $table->bigInteger('scholar_group_id')->nullable()->unsigned()->index();
            $table->bigInteger('laboratory_id')->unsigned()->index();
            

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('administrator_id')->references('id')->on('users');
            $table->foreign('scholar_group_id')->references('id')->on('scholar_groups');
            $table->foreign('laboratory_id')->references('id')->on('laboratories');


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
        Schema::dropIfExists('workshops');
    }
}
