<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
					$table->string('isbn', 20)->default('a');
					$table->year('releaseDate')->nullable();
					$table->string('format', 50)->nullable();
					$table->integer('pageNumber')->nullable();
					$table->string('language')->nullable();
					$table->text('imgUrl')->nullable();
					$table->text('img2Url')->nullable();
					$table->text('resume')->nullable();
					$table->string('place', 50)->nullable();
					$table->foreignId('owner_id')->nullable()->constrained()->onDelete('cascade');
					$table->text('comment')->nullable();
				});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
			Schema::table('books', function (Blueprint $table) {
				$table->dropColumn('isbn');
				$table->dropColumn('releaseDate');
				$table->dropColumn('format');
				$table->dropColumn('pageNumber');
				$table->dropColumn('language');
				$table->dropColumn('imgUrl');
				$table->dropColumn('img2Url');
				$table->dropColumn('resume');
				$table->dropColumn('place');
				$table->dropForeign('books_owner_id_foreign');
				$table->dropColumn('owner_id');
				$table->dropColumn('comment');
			});
    }
}
