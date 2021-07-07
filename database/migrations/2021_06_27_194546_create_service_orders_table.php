<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('responsible_id');
            $table->dateTime('start')->default(now());
            $table->dateTime('end')->nullable();
            $table->string('status')->nullable();
            $table->string('reported_defect');
            $table->string('found_defect')->nullable();
            $table->string('comments')->nullable();
            $table->decimal('amount', 10, 2)->default(0.00);
            $table->decimal('billed', 10, 2)->default(0.00);
            $table->timestamps();
            $table->foreign('responsible_id')->references('id')->on('users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_orders');
    }
}
