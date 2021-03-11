<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('project_id')->unsigned();
            $table->integer('programmer_id')->unsigned();
            $table->integer('tester_id')->unsigned()->nullable();
            $table->longText('task_name')->nullable();
            $table->date('task_dateline')->nullable();
            $table->enum('status_task', ['yes', 'no'])->nullable();
            $table->enum('status_check_tester', ['yes', 'not', 'refusal'])->nullable();
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
        Schema::dropIfExists('project_tasks');
    }
}
