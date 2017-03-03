{{--
    Copyright 2015 ppy Pty. Ltd.

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
@extends("master", [
'current_section' => 'community',
'current_action' => 'teams',
'title' => "Teams",
'body_additional_classes' => 'osu-layout--body-darker'
])

@section("content")
    <div class="osu-layout__row">
        <div class="osu-page-header-v2 osu-page-header-v2--contests">
            <div class="osu-page-header-v2__overlay"></div>
            <div class="osu-page-header-v2__title">{{trans('teams.index.title')}}</div>
            <div class="osu-page-header-v2__subtitle">{{trans('teams.index.description')}}</div>
        </div>
    </div>

    <div class="osu-layout__row osu-layout__row--page-contests">
        <div class="page-contents__content--contests">
            <div class="contest-list">
                <div class="teams-index-legend">
                    @foreach (['public', 'invite'] as $state)
                        <div class="teams-index-legend__item teams-index-legend__item--{{$state}}">{{trans("teams.index.canJoin.$state")}}</div>
                    @endforeach
                </div>
                <div class="teams-index__items">
                    @foreach ($teams as $team)
                        <div class="teams-index__item">
                            @include('teams._team', compact('team'))
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@stop
