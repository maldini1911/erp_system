<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoogleOurCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('google_our_campaigns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('campaign_type');
            $table->date('started');
            $table->date('ended');
            $table->integer('full_budget');
            $table->integer('impression');
            $table->integer('clicks');
            $table->integer('ctr');
            $table->integer('roi');
            $table->longText('campaign_notes');
            $table->integer('user_id');
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
        Schema::dropIfExists('google_our_campaigns');
    }
}
