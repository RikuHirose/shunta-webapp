<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('category_id')->unsigned()->index();

            $table->string('name')->nullable();
            $table->string('description_title')->nullable();
            $table->string('description')->nullable();
            // （価格帯）
            $table->unsignedInteger('lunch_price_zone')->nullable();
            $table->unsignedInteger('dinner_price_zone')->nullable();

            $table->string('address')->nullable();
            $table->string('nearest_station')->nullable();
            $table->string('nearest_station_minutes')->nullable();

            $table->decimal('lat', 10, 7)->nullable();
            $table->decimal('lng', 10, 7)->nullable();
            // （〇〇駅から▲分と複数駅を登録できるようにする）
            $table->string('access')->nullable();
            // （営業時間はお店によりまちまちなのでテキストで登録可能にする）
            $table->string('opening_hours')->nullable();
            // （定休日）
            $table->string('regular_holiday')->nullable();
            // （座席数）
            $table->unsignedInteger('seating_capacity')->default(0);
            // （HP URL）
            $table->decimal('hp_url')->nullable();
            // （Facebook URL）
            $table->decimal('fb_url')->nullable();
            $table->decimal('tw_url')->nullable();
            $table->decimal('ig_url')->nullable();
            $table->decimal('tel')->nullable();

            $table->string('remarks')->nullable();
            // adminからの5段階評価
            $table->unsignedInteger('admin_evaluate')->default(0);

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('restaurants');
    }
}
