<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInvoiceIdForReceiptsAndPayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->foreignId('purches_invoice_id')->nullable()->after('user_id');
        });

        Schema::table('receipts', function (Blueprint $table) {
            $table->foreignId('sale_invoice_id')->nullable()->after('user_id');
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
            $table->dropColumn('purches_invoice_id');
        });

        Schema::table('receipts', function (Blueprint $table) {
            $table->dropColumn('sale_invoice_id');
        });
    }
}
