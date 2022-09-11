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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('country');
            $table->string('street');
            $table->string('city');
            $table->string('neighbourhood');
            $table->string('phone');
            $table->string('total');
            $table->unsignedBigInteger('user_id');
            $table->json('product_id');
            $table->integer('status')->comment('0:Ödeme Aşamasında 1:Siparis Alındı 2:Yola Cıktı 3:Teslim Edildi 4:ödeme Sırasında Hata Oluştu')->default(0);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
