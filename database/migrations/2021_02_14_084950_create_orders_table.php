<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('users_email',100);
            $table->string('payment_method',100)->nullable();
            $table->integer('quantity');
            $table->string('grand_total',100);
            $table->tinyInteger('order_verify')->default(0);
            $table->string('package')->nullable();
            // $table->unsignedInteger('package')->default(1);
            $table->timestamp('expiry_date');
            $table->string('session_id')->nullable(); //
            $table->text('trackingid')->nullable(); //trackingid
            $table->text('transactionid')->nullable(); //
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
        Schema::dropIfExists('orders');
    }
}
