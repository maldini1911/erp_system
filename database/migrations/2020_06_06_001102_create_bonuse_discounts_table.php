<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonuseDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonuse_discounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bounse')->nullable();
            $table->string('discount')->nullable();
            $table->longtext('reason_bounse')->nullable();
            $table->longtext('reason_discount')->nullable();
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
        Schema::dropIfExists('bonuse_discounts');
    }
}
