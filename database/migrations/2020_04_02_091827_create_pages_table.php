<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('category')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('lang')->nullable();
            $table->string('slug');
            $table->string('name')->nullable(); //breadcrumbs, menu name
            $table->string('status');

            $table->string('images')->nullable();//['og' => 'v1', 'intro' =>, 'v2', 'v3', ...]
            $table->string('intro_title')->nullable();
            $table->string('intro_text')->nullable();
            $table->string('intro_link')->nullable();
            $table->string('title')->nullable();
            $table->string('page_title')->nullable();
            $table->text('keywords')->nullable();
            $table->text('description')->nullable();
            $table->mediumText('content')->nullable();
            $table->text('json_ld')->nullable();
            $table->string('priority', 3)->nullable();
            $table->string('change_freq', 10)->nullable();
            $table->dateTime('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
