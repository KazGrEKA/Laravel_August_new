<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')
                ->constrained('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('source_id')
                ->constrained('sources')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('title', 191);
            $table->string('slug', 191);
            $table->string('image', 255)->nullable();
            $table->enum('status', ['Draft', 'Published', 'Blocked'])->default('Draft');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->index(['status']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
