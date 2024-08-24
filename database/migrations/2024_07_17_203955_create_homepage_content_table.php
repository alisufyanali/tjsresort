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
        Schema::create('homepage_content', function (Blueprint $table) {
            $table->id();
            $table->text('main_heading')->nullable();
            $table->text('sub_heading')->nullable();
            $table->text('banner')->nullable();

            $table->text('intro_decs')->nullable();
            $table->text('intro_icon_1')->nullable();
            $table->text('intro_icon_2')->nullable();
            $table->text('intro_icon_3')->nullable();
            
            $table->text('intro_name_1')->nullable();
            $table->text('intro_name_2')->nullable();
            $table->text('intro_name_3')->nullable();

            $table->text('intro_img_back')->nullable();
            $table->text('intro_img_front')->nullable();

            $table->text('why_us')->nullable();
            $table->text('why_us_services')->nullable();
            $table->text('why_us_img_1')->nullable();
            $table->text('why_us_img_2')->nullable();
            $table->text('why_us_img_3')->nullable();

            $table->text('virtual_link')->nullable();
            $table->text('virtual_img')->nullable();
             
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepage_content');
    }
};
