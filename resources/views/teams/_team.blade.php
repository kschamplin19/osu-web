{{--
    Copyright 2015-2017 ppy Pty. Ltd.

    This file is part of osu!web. osu!web is distributed with the hope of
    attracting more community contributions to the core ecosystem of osu!.

    osu!web is free software: you can redistribute it and/or modify
    it under the terms of the Affero GNU General Public License version 3
    as published by the Free Software Foundation.

    osu!web is distributed WITHOUT ANY WARRANTY; without even the implied
    warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
    See the GNU Affero General Public License for more details.

    You should have received a copy of the GNU Affero General Public License
    along with osu!web.  If not, see <http://www.gnu.org/licenses/>.
--}}
<div class="teams-index-item">
    <a class="teams-index-item__content" href="{{ route("teams.show", $team->team_id) }}">
        <div
                class="teams-index-item__image"
                style=""
        ></div>
        <p class="teams-index-item__text teams-index-item__text--name">
            {{ $team->name }}
        </p>
        <p class="teams-index-item__text teams-index-item__text--detail">
            {{ $team->teamMembers()->get()->count() }} <i class="fa fa-user"></i>
        </p>
    </a>
</div>
