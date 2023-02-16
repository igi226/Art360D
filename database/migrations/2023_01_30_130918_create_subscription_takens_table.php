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
        Schema::create('subscription_takens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("subscription_id");
            $table->unsignedBigInteger("artist_id");
            $table->date("end_date")->format("Y-m-d H:i:s");
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
        Schema::dropIfExists('subscription_takens');
    }
};
