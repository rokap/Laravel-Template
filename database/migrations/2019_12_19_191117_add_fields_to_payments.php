<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToPayments extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('payments', function (Blueprint $table) {
			$table->date('due_date');
			$table->decimal('total');
			$table->string('status')->default('paid');
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
			$table->dropColumn(['due_date','total','status']);
		});
	}
}
