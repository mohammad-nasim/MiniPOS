<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePaymentAndReceiptNote extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->foreignId('admin_id')->nullable()->change();           
        });
        Schema::table('receipts', function (Blueprint $table) {
            $table->foreignId('admin_id')->nullable()->change();           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->foreignId('admin_id')->change();           
        });
        Schema::table('receipts', function (Blueprint $table) {
            $table->foreignId('admin_id')->change();           
        });
    }
}
