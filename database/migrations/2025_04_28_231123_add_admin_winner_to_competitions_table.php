<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('competitions', function (Blueprint $table) {
          $table->string('description');
          $table->foreignId('admin_id')->after('date_fin')->constrained('users')->onDelete('cascade');
          $table->foreignId('winner_id')->nullable()->after('admin_id')->constrained('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('competitions', function (Blueprint $table) {
            $table->dropForeign(['admin_id']);
            $table->dropForeign(['winner_id']);
            $table->dropColumn('admin_id');
            $table->dropColumn('winner_id');
            $table->dropColumn('description');
        });
    }
};
