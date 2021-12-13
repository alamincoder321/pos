<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('fname', 80);
            $table->string('lname', 60);
            $table->string('email', 100)->nullable();
            $table->string('phone', 15);
            $table->string('city_name', 80);
            $table->string('upozila', 60);
            $table->string('village', 100);
            $table->bigInteger('job_id')->unsigned();
            $table->date('join_date');
            $table->string('image');
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('employees');
    }
}
