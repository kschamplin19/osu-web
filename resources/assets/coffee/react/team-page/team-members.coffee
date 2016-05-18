###
# Copyright 2015 ppy Pty. Ltd.
#
# This file is part of osu!web. osu!web is distributed with the hope of
# attracting more community contributions to the core ecosystem of osu!.
#
# osu!web is free software: you can redistribute it and/or modify
# it under the terms of the Affero GNU General Public License version 3
# as published by the Free Software Foundation.
#
# osu!web is distributed WITHOUT ANY WARRANTY; without even the implied
# warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
# See the GNU Affero General Public License for more details.
#
# You should have received a copy of the GNU Affero General Public License
# along with osu!web.  If not, see <http://www.gnu.org/licenses/>.
###
el = React.createElement

class TeamPage.TeamMembers extends React.Component
  componentDidMount: ->
    if @props.withEdit
      $('#admins, #members').sortable(
        connectWith: '.team-members__list', 
        cancel: ".ui-state-disabled"
        items: "div:not(.team-members__add)"
        update: (event, ui) ->
          console.log event
          console.log ui
        ).disableSelection()
  render: =>
    el 'div', className: 'team-members',
      el 'p', className: 'team-members__title', Lang.get("teams.show.admins")
      el 'div', className: 'team-members__list', id: 'admins',
        @props.team.admins.data.map (m) ->
          el TeamMemberAvatar, user: m, key: m.id, modifiers: ['members'], locked: m.id == window.currentUser.id
        if @props.withEdit
          el TeamPage.AddUserButton, team: @props.team, array: @props.team.admins.data
      el 'p', className: 'team-members__title', Lang.get("teams.show.members")
      el 'div', className: 'team-members__list', id: 'members',
        @props.team.members.data.map (m) ->
          el TeamMemberAvatar, user: m, key: m.id, modifiers: ['members']
        if @props.withEdit
          el TeamPage.AddUserButton, team: @props.team, array: @props.team.members.data
