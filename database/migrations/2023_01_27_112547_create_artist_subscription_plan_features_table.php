<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artist_subscription_plan_features', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("subscription_id");
            $table->string("num_of_video");
            $table->string("num_of_statues");
            $table->string("max_exhibition");
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
        Schema::dropIfExists('artist_subscription_plan_features');
    }
};
