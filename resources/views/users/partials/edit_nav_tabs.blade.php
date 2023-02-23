<!-- Nav tabs -->
<ul class="nav nav-pills nav-stacked" style="display:block">
    <div class="btn btn-default">
        {!! link_to_route('users.edit', __('user.edit'), [$user->id]) !!}
    </div>
    <div class="btn btn-default">
        {!! link_to_route('users.edit', __('app.address').' &amp; '.__('app.contact'), [$user->id, 'tab' => 'contact_address']) !!}
    </div>
    <div class="{{ request('tab') == 'login_account' ? 'active' : '' }} btn">
        {!! link_to_route('users.edit', __('app.login_account'), [$user->id, 'tab' => 'login_account']) !!}
    </div>
    <div class="{{ request('tab') == 'death' ? 'active' : '' }} btn">
        {!! link_to_route('users.edit', __('user.death'), [$user->id, 'tab' => 'death']) !!}
    </div>
</ul>
<br>
<br>
<br>
@can('delete', $user)
{{ link_to_route('users.edit', __('user.delete'), [$user, 'action' => 'delete'], ['class' => 'btn btn-danger', 'id' => 'del-user-'.$user->id]) }}
@endcan
