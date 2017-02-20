<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('message');
            $table->unsignedTinyInteger('visibility');
            $table->unsignedMediumInteger('user_id');
            $table->unsignedMediumInteger('team_id');
            $table->foreign('user_id')->references('user_id')->on('phpbb_users');
            $table->foreign('team_id')->references('team_id')->on('teams');
        });
        Schema::create('team_stats', function (Blueprint $table) {
            $table->unsignedMediumInteger('team_id');
            $table->foreign('team_id')->references('team_id')->on('teams');
            $table->integer('count300')->default(0);
            $table->integer('count100')->default(0);
            $table->integer('count50')->default(0);
            $table->integer('countMiss')->default(0);
            $table->bigInteger('accuracy_total')->unsigned();
            $table->bigInteger('accuracy_count')->unsigned();
            $table->float('accuracy');
            $table->mediumInteger('playcount');
            $table->bigInteger('ranked_score');
            $table->bigInteger('total_score');
            $table->mediumInteger('x_rank_count');
            $table->mediumInteger('s_rank_count');
            $table->mediumInteger('a_rank_count');
            $table->mediumInteger('rank');
            $table->float('level')->unsigned();
            $table->mediumInteger('replay_popularity')->unsigned()->default(0);
            $table->mediumInteger('fail_count')->unsigned()->default(0);
            $table->mediumInteger('exit_count')->unsigned()->default(0);
            $table->smallInteger('max_combo')->unsigned()->default(0);
            $table->char('country_acronym', 2)->default('');
            $table->float('rank_score')->unsigned();
            $table->integer('rank_score_index')->unsigned();
            $table->float('accuracy_new')->unsigned();
            // $table->timestamp('last_update')->useCurrent();
            $table->timestamp('last_played')->useCurrent();
            $table->index('ranked_score', 'ranked_score');
            $table->index('rank_score', 'rank_score');
            $table->index(['country_acronym', 'rank_score'], 'country_acronym_2');
            $table->index('playcount', 'playcount');
            $table->unsignedTinyInteger('mode');
            $table->primary(['team_id', 'mode']);
            
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_messages');
        Schema::dropIfExists('team_stats');
    }
}
