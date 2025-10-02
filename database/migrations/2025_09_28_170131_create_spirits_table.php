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
        Schema::create('spirits', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('name'); // Aladasturi Qvevri
            $table->string('image_path')->nullable();    // S3/MinIO key or URL
            $table->string('trademark');     // KGM, ANNATA
            $table->json('gallery')->nullable();
            $table->json('grape_variety')->nullable();
            $table->string('making')->nullable();        // chacha, brandy
            $table->string('region')->nullable();
            $table->string('appellation')->nullable();
            $table->decimal('abv', 4, 2)->nullable();
            $table->string('serving_temperature')->nullable();
            $table->text('food_pairings')->nullable();
            $table->string('closure')->nullable();
            $table->string('volume')->nullable();
            $table->string('bottle')->nullable();
            $table->string('description_pdf')->nullable();    // S3/MinIO key or URL
            $table->longText('description')->nullable();
            $table->longText('visual')->nullable();
            $table->longText('aroma')->nullable();
            $table->longText('taste')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['slug', 'deleted_at'], 'wines_slug_deleted_at_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spirits');
    }
};
