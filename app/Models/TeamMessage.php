<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMessage extends Model
{
    //
    protected $table = 'team_messages';
    protected $primaryKey = 'id';
    protected $visible = ['message'];
    protected $guarded = [];
    protected $casts = [
        'team_id' => 'integer',
        'user_id' => 'integer',
    ];
    
    public function Poster()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'user_id');
    }
    
    public function Team()
    {
        return $this->belongsTo('App\Models\Team', 'team_id', 'team_id');
    }
}
