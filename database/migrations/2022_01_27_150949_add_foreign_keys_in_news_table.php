<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysInNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->foreignId('category_id')->after('id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('source_id')->after('category_id')->constrained('sources')->onDelete('cascade');
            $table->index(['slug', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropIndex(['slug', 'status']);
            $table->dropForeign('category_id');
            $table->dropColumn('category_id');
            $table->dropForeign('source_id');
            $table->dropColumn('source_id');
        });
    }
}
