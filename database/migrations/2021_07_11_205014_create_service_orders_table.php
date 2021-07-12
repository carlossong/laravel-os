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
            $table->unsignedBigInteger('service_id')->nullable();
            $table->dateTime('start')->default(now());
            $table->dateTime('end')->nullable();
            $table->string('status')->nullable();
            $table->text('reported_defect');
            $table->text('found_defect')->nullable();
            $table->text('solution_adopted')->nullable();
            $table->text('comments')->nullable();
            $table->decimal('amount', 10, 2)->nullable();
            $table->decimal('billed', 10, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('responsible_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('CASCADE');
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
