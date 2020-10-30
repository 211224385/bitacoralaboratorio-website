<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScholarGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholar_groups', function (Blueprint $table) {
            $table->id();

            $table->tinyInteger('grade')->unsigned();
            $table->date('start');
            $table->date('end');
            $table->bigInteger('career_id')->unsigned()->index();

            $table->foreign('career_id')->references('id')->on('careers');



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
        Schema::dropIfExists('scholar_groups');
    }
}
