<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProjectToEstimateInvoicePurchaseBillCheckPayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estimates', function (Blueprint $table) {
            $table->unsignedBigInteger('project_id')->nullable();
            
	        // Relationships
	        $table->foreign('project_id')->references('id')->on('projects')->onDelete('set null');
        });
        Schema::table('invoices', function (Blueprint $table) {
	        $table->unsignedBigInteger('project_id')->nullable();
	
	        // Relationships
	        $table->foreign('project_id')->references('id')->on('projects')->onDelete('set null');
        });
        Schema::table('payments', function (Blueprint $table) {
	        $table->unsignedBigInteger('project_id')->nullable();
	
	        // Relationships
	        $table->foreign('project_id')->references('id')->on('projects')->onDelete('set null');
        });
        Schema::table('purchase_orders', function (Blueprint $table) {
	        $table->unsignedBigInteger('project_id')->nullable();
	
	        // Relationships
	        $table->foreign('project_id')->references('id')->on('projects')->onDelete('set null');
        });
        Schema::table('bills', function (Blueprint $table) {
	        $table->unsignedBigInteger('project_id')->nullable();
	
	        // Relationships
	        $table->foreign('project_id')->references('id')->on('projects')->onDelete('set null');
        });
        Schema::table('checks', function (Blueprint $table) {
	        $table->unsignedBigInteger('project_id')->nullable();
	
	        // Relationships
	        $table->foreign('project_id')->references('id')->on('projects')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::table('estimates', function (Blueprint $table) {
		    $table->dropForeign(['project_id']);
		    $table->dropColumn(['project_id']);
	    });
	    Schema::table('invoices', function (Blueprint $table) {
		    $table->dropForeign(['project_id']);
		    $table->dropColumn(['project_id']);
	    });
	    Schema::table('payments', function (Blueprint $table) {
		    $table->dropForeign(['project_id']);
		    $table->dropColumn(['project_id']);
	    });
	    Schema::table('purchase_orders', function (Blueprint $table) {
		    $table->dropForeign(['project_id']);
		    $table->dropColumn(['project_id']);
	    });
	    Schema::table('bills', function (Blueprint $table) {
		    $table->dropForeign(['project_id']);
		    $table->dropColumn(['project_id']);
	    });
	    Schema::table('checks', function (Blueprint $table) {
		    $table->dropForeign(['project_id']);
		    $table->dropColumn(['project_id']);
	    });
    }
}
