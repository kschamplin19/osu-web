<?php
/**
 *    Copyright 2015 ppy Pty. Ltd.
 *
 *    This file is part of osu!web. osu!web is distributed with the hope of
 *    attracting more community contributions to the core ecosystem of osu!.
 *
 *    osu!web is free software: you can redistribute it and/or modify
 *    it under the terms of the Affero GNU General Public License version 3
 *    as published by the Free Software Foundation.
 *
 *    osu!web is distributed WITHOUT ANY WARRANTY; without even the implied
 *    warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *    See the GNU Affero General Public License for more details.
 *
 *    You should have received a copy of the GNU Affero General Public License
 *    along with osu!web.  If not, see <http://www.gnu.org/licenses/>.
 */
namespace App\Http\Controllers;

use App\Models\Team;
use App\Transformers\TeamTransformer;
use App\Models\User;
use Auth;
use Request;


class TeamsController extends Controller
{
    protected $section = 'community';
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        view()->share('current_action', 'getTeams');
        $teams = Team::where('public', '>=', 1)->get();
        return view('teams.index', compact('teams'));
    }
    
    public function show($id)
    {
        $team = Team::lookup($id);
        if ($team === null) {
            abort(404);
        }
        $teamArray = json_item(
            $team,
            new TeamTransformer($team)
        );
        if ($team->public == 0) {
            // it's private so we have to check if the user can go
            $this->middleware('auth');
            $user = Auth::user();
            if (!$this->CurrentUserIsMember($team, $user)) {
                abort(401);
            }
            
        }
        return view('teams.show', compact('team', 'teamArray'));
    }
    
    private function CurrentUserIsMember($team, $user)
    {
        return $team->teamMembers()->get()->contains($user);
    }
    
    public function addMember($id)
    {
        $this->middleware('auth');
        $team = Team::lookup($id);
        if ($team === null) {
            abort(404);
        }
        
        $admin = Auth::user();
        $user = User::lookup(Request::input('user'));
        if ($this->CurrentUserIsAdmin($team, $admin)) {
            $team->teamMembers()->attach($user, ['permissions' => Request::input('admin', 0)]);
        } else {
            abort(401);
        }
        return 201;
    }
    
    private function CurrentUserIsAdmin($team, $user)
    {
        return $team->teamMembers()->wherePivot('permissions', '>=', 1)->get()->contains($user);
    }
    
    public function removeMember($id, $user_id)
    {
        $this->middleware('auth');
        
        $team = Team::lookup($id);
        if ($team === null) {
            abort(404);
        }
        $admin = Auth::user();
        $user = User::lookup($user_id);
        if ($this->CurrentUserIsAdmin($team, $admin)) {
            $team->teamMembers()->detach($user);
        } else {
            abort(401);
        }
        return 200;
    }
    
    public function addMessage($id)
    {
        $this->middleware('auth');
        
        $team = Team::lookup($id);
        if ($team === null) {
            abort(404);
        }
        $poster = Auth::user();
        if ($this->CurrentUserIsAdmin($team, $poster)) {
            $team->posts()->create([
                'message' => Request::input('message'),
                'user_id' => $poster->user_id
            ]);
        } else {
            abort(401);
        }
        return 201;
    }
}
