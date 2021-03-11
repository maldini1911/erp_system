<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacebookOurCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facebook_our_campaigns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('campaign_type');
            $table->date('started')->nullable();
            $table->date('ended')->nullable();
            $table->integer('full_budget')->nullable();
            $table->integer('messages_quantity')->nullable();
            $table->integer('reached')->nullable();
            $table->integer('engagement')->nullable();
            $table->integer('comments')->nullable();
            $table->integer('likes')->nullable();
            $table->integer('total_clicks')->nullable();
            $table->integer('page_likes')->nullable();
            $table->string('upload_screenshot')->nullable();
            $table->string('campaign_notes')->nullable();
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('facebook_our_campaigns');
    }
}
