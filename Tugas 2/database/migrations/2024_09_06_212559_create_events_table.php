<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id('event_id');
            $table->string('title');
            $table->unsignedBigInteger('category_id');
            $table->text('description');
            $table->dateTime('registration_date');
            $table->dateTime('event_date');
            $table->unsignedBigInteger('venue_id');
            $table->unsignedBigInteger('ticket_id');
            $table->timestamps();

            // Add foreign key constraints
            $table->foreign('category_id')->references('id')->on('event_categories')->onDelete('cascade');
            $table->foreign('venue_id')->references('id')->on('venues')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
