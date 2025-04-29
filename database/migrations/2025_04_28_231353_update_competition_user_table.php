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
        Schema::table('competition_user', function (Blueprint $table) {
            $table->unique(['user_id', 'competition_id']);
            $table->enum('status', ['inscrit', 'gagné', 'perdu'])->default('inscrit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('competition_user', function (Blueprint $table) {
            $table->dropUnique(['competition_user_user_id_competition_id_unique']);
            $table->dropColumn('status');
        });
    }
};
