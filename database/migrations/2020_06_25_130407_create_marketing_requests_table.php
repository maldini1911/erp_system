<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketingRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marketing_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('manage_client_id')->unsigned();
            $table->integer('hr_id')->unsigned();
            $table->string('file_download')->nullable();
            $table->string('link_page')->nullable();
            $table->string('name_page')->nullable();
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
        Schema::dropIfExists('marketing_requests');
    }
}
