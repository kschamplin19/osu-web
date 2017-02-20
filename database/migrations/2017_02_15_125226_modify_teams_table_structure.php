<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyTeamsTableStructure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teams', function (Blueprint $table) {
            //
            $table->boolean('public')->default(0);
        });
        Schema::table('team_members', function (Blueprint $table) {
            $table->dropColumn('is_admin');
            $table->integer('permissions')->unsigned()->default(0);
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teams', function (Blueprint $table) {
            //
            $table->dropColumn('public');
        });
        Schema::table('team_members', function (Blueprint $table) {
            $table->boolean('is_admin')->default(false);
            $table->dropColumn('permissions');
        });
    }
}
