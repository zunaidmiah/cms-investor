<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddBannerimageFieldsToManufacturingSlidingbannersTable extends Migration {

	/**
	 * Make changes to the table.
	 *
	 * @return void
	 */
	public function up()
	{	
		Schema::table('manufacturing_slidingbanners', function(Blueprint $table) {		
			
			$table->string('bannerimage_file_name')->nullable();
			$table->integer('bannerimage_file_size')->nullable();
			$table->string('bannerimage_content_type')->nullable();
			$table->timestamp('bannerimage_updated_at')->nullable();

		});

	}

	/**
	 * Revert the changes to the table.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('manufacturing_slidingbanners', function(Blueprint $table) {

			$table->dropColumn('bannerimage_file_name');
			$table->dropColumn('bannerimage_file_size');
			$table->dropColumn('bannerimage_content_type');
			$table->dropColumn('bannerimage_updated_at');

		});
	}

}
