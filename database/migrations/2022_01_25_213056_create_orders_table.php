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
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->decimal('total');
            $table->text('address_1');
            $table->text('address_2')->nullable();
            $table->string('city');
            $table->string('country');
            $table->string('postcode');
            $table->text('note')->nullable();
            $table->string('payment_status',1);
            $table->string('shipping_status',50)->default('free');;
            $table->string('status',50)->default('pending');
            $table->string('value_status',1)->default('0');
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
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
