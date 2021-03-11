<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManageclientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manageclients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('client_name');
            $table->string('client_phone')->nullable();
            $table->string('client_whatsapp')->nullable();
            $table->string('client_email')->nullable();
            $table->string('client_website')->nullable();
            $table->string('client_facebook_page')->nullable();
            $table->string('client_youtube_channel')->nullable();
            $table->string('client_career')->nullable();
            $table->string('client_nationality')->nullable();
            $table->string('client_city')->nullable();
            $table->longtext('client_note')->nullable();
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
        Schema::dropIfExists('manageclients');
    }
}
