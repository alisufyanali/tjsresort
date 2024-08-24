<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('events')) {

        Schema::create('events', function (Blueprint $table) {

                $table->id();
                $table->time('open_time');
                $table->time('close_time');
                $table->date('start_date')->nullable();
                $table->date('end_date')->nullable();
                $table->string('title')->nullable();
                $table->string('location')->nullable();
                $table->text('schedule')->nullable();
                $table->text('description')->nullable();
                $table->text('more_about_event')->nullable();
                $table->text('image')->nullable();
                $table->timestamps();
        });
    }
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
