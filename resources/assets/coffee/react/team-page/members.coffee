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

class TeamPage.Members extends React.Component
  render: =>
    elements = ['admins', 'members']

    el 'div', className: 'page-contents__content profile-stats',
      el 'p', 'Members'
      el 'div', className: 'page-contents__row',
        @props.team.members.data.map (m) ->
          el UserAvatar, user: m, key: m.id, modifiers: ['profile']
      el 'p', 'Members'
      el 'div', className: 'page-contents__row',
        @props.team.admins.data.map (m) ->
          el UserAvatar, user: m, key: m.id, modifiers: ['profile']
