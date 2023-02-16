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
        Schema::create('artworks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('artist_id');
            $table->date('year_created')->format('Y');
            $table->string('medium');
            $table->string('category_ids');
            $table->unsignedBigInteger('collection_id');
            $table->unsignedBigInteger('style_id');
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->string('other_subject')->nullable();
            $table->unsignedBigInteger('material_id');
            $table->string('edition')->nullable();
            $table->string('width');
            $table->string('height');
            $table->string('depth');
            $table->string('number_of_frame')->default(0);
            $table->string('price');
            $table->unsignedBigInteger('movement_id');
            $table->string('markings')->nullable();
            $table->string('exhibitions')->nullable();
            $table->longText('about_the_work')->nullable();
            $table->string('prints_available')->nullable();
            $table->string('also_available_condition')->nullable();
            $table->string('artwork_type');
            $table->string('auction_starting_price')->nullable();
            $table->string('auction_end_price')->nullable();
            $table->string('auction_reserve_price')->nullable();
            $table->string('auction_start_date')->nullable();
            $table->string('auction_end_date')->nullable();
            $table->string('rent_price_per_one_month')->nullable();
            $table->string('rent_price_per_three_month')->nullable();
            $table->string('rent_price_per_six_month')->nullable();
            $table->string('rent_price_per_year')->nullable();
            $table->string('rent_discount_percentage')->nullable();
            $table->string('direct_sale_discount_percentage')->nullable();
            $table->string('discount_start_dt')->format('Y-m-d')->nullable();
            $table->string('discount_end_dt')->format('Y-m-d')->nullable();
            $table->string('copyright')->nullable();
            $table->string('ready_to_hang');
            $table->string('certification');
            $table->string('signed_by');
            $table->string('city')->nullable();
           
            $table->boolean('on_market')->default(0);
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
        Schema::dropIfExists('artworks');
    }
};
