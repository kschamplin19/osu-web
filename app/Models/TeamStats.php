<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamStats extends Model
{
    //
    protected $primaryKey = ['team_id', 'mode'];
    protected $table = 'team_stats';
    protected $incrementing = false;
    
    
    public function Team()
    {
        return $this->belongsTo('App\Models\Team', 'team_id', 'team_id');
    }
    
    public function update()
    {
        // Do Nothing.
    }
}
