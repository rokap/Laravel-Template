<?php
	
	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Facades\Schema;
	
	class CreateItemsTable extends Migration
	{
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
			Schema::create('items', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->timestamps();
				$table->string('name');
				$table->string('sku')->nullable();
				$table->unsignedBigInteger('item_category_id')->nullable();
				$table->boolean('track_qty_on_hand')->default(false);
				$table->boolean('purchase')->default(false);
				$table->unsignedBigInteger('item_type_id')->default(0);
				$table->decimal('unit_price')->default(0);
				$table->decimal('purchase_cost')->default(0);
				$table->decimal('qty_on_hand')->nullable();
				$table->unsignedBigInteger('income_account_id');
				$table->unsignedBigInteger('asset_account_id')->nullable();
				$table->unsignedBigInteger('expense_account_id')->nullable();
				$table->boolean('taxable')->default(false);
				$table->boolean('active')->default(false);
				$table->date('inventory_start_date')->nullable();
				$table->text('description')->nullable();
				$table->text('purchase_description')->nullable();
				
				
				$table->foreign('item_category_id')->references('id')->on('item_categories')->onDelete('set null');
				$table->foreign('item_type_id')->references('id')->on('item_types')->onDelete('cascade');
				$table->foreign('income_account_id')->references('id')->on('accounts')->onDelete('cascade');
				$table->foreign('asset_account_id')->references('id')->on('accounts')->onDelete('cascade');
				$table->foreign('expense_account_id')->references('id')->on('accounts')->onDelete('cascade');
			});
		}
		
		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down()
		{
			Schema::dropIfExists('items');
		}
	}
