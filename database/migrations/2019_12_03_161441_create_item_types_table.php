<?php
	
	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Facades\Schema;
	use App\Models\ItemType;
	
	class CreateItemTypesTable extends Migration
	{
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
			Schema::create('item_types', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->string("name");
			});
			
			$types = ['Service', 'NonInventory', 'Inventory', 'Group'];
			foreach ($types as $type) {
				ItemType::create(['name' => $type]);
			}
		}
		
		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down()
		{
			Schema::dropIfExists('item_types');
		}
	}
