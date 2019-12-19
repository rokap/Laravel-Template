<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_statuses', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->string('name');
           $table->timestamps();
        });
        Schema::table('projects', function (Blueprint $table) {
            $table->unsignedBigInteger('project_status_id')->nullable();
	
	        // Relationships
	        $table->foreign('project_status_id')->references('id')->on('project_statuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::dropIfExists('project_statuses');
        Schema::table('projects', function (Blueprint $table) {
	
	        $table->dropForeign(['project_status_id']);
            $table->dropColumn(['project_status_id']);
        });
    }
}
