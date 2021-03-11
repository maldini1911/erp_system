<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgrammingProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programming_projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('project_name');
            $table->integer('client_id')->unsigned()->nullable();
            $table->string('project_type');
            $table->integer('project_price')->nullable();
            $table->integer('amount_paid')->nullable();
            $table->integer('remaining_amount')->nullable();
            $table->date('start_resgister')->nullable();
            $table->date('finish_resgister')->nullable();
            $table->date('date_start')->nullable();
            $table->date('date_line')->nullable();
            $table->integer('project_level')->nullable();
            $table->integer('project_status');
            $table->string('project_url_demo')->nullable();
            $table->string('project_url_domin')->nullable();
            $table->string('project_ftp')->nullable();
            $table->string('project_upload')->nullable();
            $table->integer('count_programmers')->nullable();
            $table->integer('user_id')->unsigned();
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
        Schema::dropIfExists('programming_projects');
    }
}
