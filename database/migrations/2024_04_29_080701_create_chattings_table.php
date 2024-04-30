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
        Schema::create('chattings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('seller_id')->nullable();
            $table->bigInteger('admin_id')->nullable();
            $table->bigInteger('delivery_man_id')->nullable();
            $table->text('message')->nullable();
            $table->json('attachment')->nullable();
            $table->boolean('sent_by_customer')->default(false);
            $table->boolean('sent_by_seller')->default(false);
            $table->boolean('sent_by_admin')->nullable();
            $table->boolean('sent_by_delivery_man')->nullable();
            $table->boolean('seen_by_customer')->default(true);
            $table->boolean('seen_by_seller')->default(true);
            $table->boolean('seen_by_admin')->nullable();
            $table->boolean('seen_by_delivery_man')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->bigInteger('shop_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chattings');
    }
};
