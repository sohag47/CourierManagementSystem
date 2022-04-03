<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourierHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courier_history', function (Blueprint $table) {
            $table->id();
            $table->integer('courier_id');
            $table->integer('sender_branch_id');
            $table->integer('sender_deliveryman_id');
            $table->integer('recipient_branch_id');
            $table->integer('recipient_deliveryman_id');
            $table->boolean('status')->default(0);
            $table->date('order_received')->nullable();
            $table->date('pickup')->nullable();
            $table->date('arrived_destination')->nullable();
            $table->date('out_of_delivery')->nullable();
            $table->date('delivered')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courier_history');
    }
}
