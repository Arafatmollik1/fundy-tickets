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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_id')->unique();
            $table->string('user_id');
            $table->string('fund_id');
            $table->string('payers_name');
            $table->string('payers_email');
            $table->string('payers_phone');
            $table->string('message')->nullable();
            $table->string('ref_no');
            $table->integer('participant_no');
            $table->integer('amount');
            $table->timestamp('payment_date')->useCurrent();
            $table->string('status')->default('pending');
            $table->timestamps(); // Optional, if you want to track created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments_simplified');
    }
};
