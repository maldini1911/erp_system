<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoogleCoustmerCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('google_coustmer_campaigns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('client_name');
            $table->string('campaign_type');
            $table->date('started');
            $table->date('ended');
            $table->integer('full_budget');
            $table->integer('custom_budget');
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
        Schema::dropIfExists('google_coustmer_campaigns');
    }
}
