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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->text('image');
            $table->string('title');
            $table->text('description');
            $table->integer('category_id');
            $table->timestamps();
            //another field needed to be added for SOFT-DELETE, just as we added in the post.php model
            //by php artisan make:migration add_posts_table --table=posts thnen migrate the newly added table. 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
