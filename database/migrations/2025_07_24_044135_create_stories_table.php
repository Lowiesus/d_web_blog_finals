<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('stories', function (Blueprint $table) {
            $table->id('story_id'); // This is enough. It’s auto-increment and primary key.
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('content');
            $table->string('image')->nullable(); // Don't forget this!
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('stories');
    }
};