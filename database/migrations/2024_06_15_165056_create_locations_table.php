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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('location_name');
            $table->string('slug');
            $table->string('featured')->default(0);
            $table->decimal('per_night_charges', 8, 2)->nullable();
            $table->decimal('daily', 8, 2);
            $table->decimal('weekly', 8, 2);
            $table->decimal('monthly', 8, 2);

            $table->string('children')->nullable(); 
            $table->string('adult')->nullable(); 
            $table->string('pet')->nullable(); 
            
            $table->date('avaliablity_from')->nullable(); 
            $table->date('avaliablity_to')->nullable(); 

            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->string('location_images')->nullable(); // JSON or comma-separated values
            $table->string('featured_image')->nullable();
            $table->text('location_services')->nullable(); // JSON or text describing services
            
            $table->string('latitude')->nullable(); 
            $table->string('longitude')->nullable(); 
            $table->string('address')->nullable(); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
