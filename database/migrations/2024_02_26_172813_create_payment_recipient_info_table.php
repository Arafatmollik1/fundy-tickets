<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_recipient_info', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('recipient_name')->nullable();
            $table->string('recipient_bank_acc')->nullable();
            $table->string('recipient_mobilepay')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_recipient_info');
    }
};
