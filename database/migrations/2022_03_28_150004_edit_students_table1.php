<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditStudentsTable1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
			Schema::table('students', function (Blueprint $table) {
				/*$table->dropColumn('age');
				$table->dropColumn('gender')->nullable();
				$table->dropColumn('phone')->nullable();
				$table->dropColumn('address')->nullable();
				$table->dropColumn('class')->nullable();*/

				$table->string('age')->nullable()->change();
				$table->string('gender')->nullable()->change();
				$table->string('phone')->nullable()->change();
				$table->string('address')->nullable()->change();
				$table->string('class')->nullable()->change();
			});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
