<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('post_content', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('fund_id');
            $table->string('header');
            $table->string('subheader');
            $table->string('img_src');
            $table->string('ticket_price')->nullable();
            $table->string('place_of_event')->nullable();
            $table->timestamp('event_date')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('post_content_simplified');
    }
};
