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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->date('date_in');
            $table->date('date_out'); 
            $table->integer('nights'); 
            $table->string('truck_number')->nullable();
            $table->string('truck_color')->nullable();
            $table->integer('number_of_spaces')->nullable();
            $table->string('over_sized')->nullable();
            $table->integer('children')->nullable();
            $table->integer('adult')->nullable();
            $table->integer('pet')->nullable();
            $table->decimal('total_price', 8, 2); // Assuming price with 8 digits total, 2 after the decimal
            $table->decimal('grand_price', 8, 2); // Assuming price with 8 digits total, 2 after the decimal
            $table->foreignId('location_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('coupon_id')->nullable();
            $table->string('payment_method')->default('Card');
            $table->string('stripe_response')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
