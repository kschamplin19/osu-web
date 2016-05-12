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
{button, div, p} = React.DOM
el = React.createElement

class ProfilePage.UserPage extends React.Component
  render: =>
    div className: 'page-extra',
      el ProfilePage.ExtraHeader, name: @props.name, withEdit: @props.withEdit

      if !@props.userPage.editing && @props.withEdit && @props.userPage.html != ''
        div className: 'page-extra__actions',
          div className: 'forum-post-actions',
            button
              className: 'forum-post-actions__action'
              onClick: @editStart
              el Icon, name: 'edit'

      if @props.userPage.editing
        el ProfilePage.UserPageEditor, userPage: @props.userPage
      else if @props.withEdit && @props.userPage.html == ''
        @pageNew()
      else
        @pageShow()


  editStart: (e) ->
    e.preventDefault()
    $.publish 'user:page:update', editing: true


  pageNew: =>
<<<<<<< HEAD
    canCreate = @props.withEdit and @props.user.isSupporter

    el 'div', className: 'profile-extra-user-page--new',
      el 'button',
        className: 'profile-extra-user-page__new-content btn-osu btn-osu--lite btn-osu--profile-page-edit'
=======
    div className: 'text-center',
      button
        className: 'profile-extra-user-page__new-content   btn-osu btn-osu--lite btn-osu--profile-page-edit'
>>>>>>> master
        onClick: @editStart
        disabled: !@props.user.isSupporter
        Lang.get 'users.show.page.edit_big'

<<<<<<< HEAD
      el 'p', className: 'profile-extra-user-page__new-content profile-extra-user-page__new-content--icon',
        el 'i', className: 'fa fa-pencil-square-o'

      el 'p',
=======
      p className: 'profile-extra-user-page__new-content profile-extra-user-page__new-content--icon',
        el Icon, name: 'pencil-square-o'

      p
>>>>>>> master
        className: 'profile-extra-user-page__new-content'
        dangerouslySetInnerHTML:
          __html: Lang.get 'users.show.page.description'

      if !@props.user.isSupporter
<<<<<<< HEAD
        el 'p',
=======
        p
>>>>>>> master
          className: 'profile-extra-user-page__new-content'
          dangerouslySetInnerHTML:
            __html: Lang.get 'users.show.page.restriction_info'


  pageShow: =>
    div dangerouslySetInnerHTML:
      __html: @props.userPage.html
<<<<<<< HEAD

  render: =>
    withEditButton = @props.withEdit

    if withEditButton && @props.userPage.html == ''
      withEditButton = false
      page = @pageNew()
    else if @props.userPage.editing
      page = el ProfilePage.UserPageEditor, userPage: @props.userPage
    else
      page = @pageShow()

    el 'div', className: 'page-extra',
      el ProfilePage.ExtraHeader, name: @props.name, withEdit: @props.withEdit

      if withEditButton && !@props.userPage.editing
        el 'div', className: 'page-extra__actions',
          el 'div', className: 'forum-post-actions',
            el 'a',
              className: 'forum-post-actions__action'
              href: '#'
              onClick: @editStart
              el 'i', className: 'fa fa-edit'
      page
=======
>>>>>>> master
