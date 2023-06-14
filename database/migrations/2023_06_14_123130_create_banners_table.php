<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->boolean('active')->default(true);
            $table->date('date');
            $table->timestamps();

        });
        Schema::create('banner_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('banner_id');
            $table->string('locale')->index();
            $table->string('title');
            $table->string('description',255)->nullable();

            $table->unique(['banner_id', 'locale']);
            $table->foreign('banner_id')->references('id')->on('banners')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
