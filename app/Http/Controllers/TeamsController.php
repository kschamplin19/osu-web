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
use Auth;

class TeamsController extends Controller
{
    protected $section = 'community';

    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();
    }

    public function index()
    {
        return view('teams.index');
    }

    public function show($id)
    {
        $team = Team::lookup($id);
        if ($team === null) {
            abort(404);
        }
        $teamArray = fractal_item_array(
            $team,
            new TeamTransformer($team)
        );

        return view('teams.show', compact('team', 'teamArray'));
    }

    public function updateMembers($id)
    {
        // {admins: [1,2,3,52153], members: [46,45,6465,546234]}
        $team = Team::lookup($id);
        if ($team === null) {
            abort(404);
        }
    }
}
