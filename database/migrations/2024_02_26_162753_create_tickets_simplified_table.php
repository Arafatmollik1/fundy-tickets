<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tickets_simplified', function (Blueprint $table) {
            $table->id();
            $table->string('fund_id');
            $table->string('ticket_user_name')->nullable();
            $table->string('ticket_user_email')->nullable();
            $table->string('ticket_user_phone')->nullable();
            $table->integer('ticket_quantity')->default(1);
            $table->enum('status', ['pending', 'none', 'confirmed'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tickets_simplified');
    }
};
