<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Client extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->integer('phone')->nullable();
            $table->integer('phone2')->nullable();
            $table->string('landline')->nullable();
            $table->string('email')->nullable();
            $table->string('country')->nullable();
            $table->integer('source')->nullable();
            $table->integer('response')->nullable();
            $table->dateTime('meeting_client')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
