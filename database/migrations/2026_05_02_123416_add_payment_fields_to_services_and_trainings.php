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
        Schema::table('services', function (Blueprint $table) {
            $table->string('order_number')->unique()->after('id');
            $table->string('payment_method')->nullable()->after('total_price');
            $table->string('virtual_account')->nullable()->after('payment_method');
            $table->string('payment_proof')->nullable()->after('virtual_account');
        });

        Schema::table('training_registrations', function (Blueprint $table) {
            $table->string('order_number')->unique()->after('id');
            $table->string('payment_method')->nullable()->after('total_price');
            $table->string('virtual_account')->nullable()->after('payment_method');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['order_number', 'payment_method', 'virtual_account', 'payment_proof']);
        });

        Schema::table('training_registrations', function (Blueprint $table) {
            $table->dropColumn(['order_number', 'payment_method', 'virtual_account']);
        });
    }
};
