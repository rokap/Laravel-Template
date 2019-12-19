<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToInvoices extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('invoices', function (Blueprint $table) {
			$table->date('due_date');
			$table->decimal('total');
			$table->enum('status',['open','paid','overdue','cancelled']);
		});
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('invoices', function (Blueprint $table) {
			$table->dropColumn(['due_date','total','status']);
		});
	}
}
