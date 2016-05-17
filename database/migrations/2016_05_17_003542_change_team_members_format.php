<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTeamMembersFormat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('team_members', function (Blueprint $table) {
            $table->mediumInteger('team_id');
            $table->mediumInteger('user_id');
            $table->boolean('is_admin')->default(false);
            $table->primary(['team_id', 'user_id']);
            //
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
