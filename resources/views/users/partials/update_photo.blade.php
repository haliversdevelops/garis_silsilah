<div class="panel panel-default">
    <div class="panel-heading"><h3 class="panel-title">{{ __('user.update_photo') }}</h3></div>
    {{ Form::open(['route' => ['users.photo-upload', $user], 'method' => 'patch', 'files' => true]) }}
    <div class="panel-body text-center">
        <img style="width:100%;max-width:300px" src="{{ asset('storage/'. $user->photo_path) }}">
    </div>
    <div class="panel-body">
        {!! FormField::file('photo', ['required' => true, 'label' => __('user.reupload_photo'), 'info' => ['text' => 'Format jpeg,png,jpg,gif, maks: 2048 Kb.', 'class' => 'warning']]) !!}
    </div>
    <div class="panel-footer">
        {!! Form::submit(__('user.update_photo'), ['class' => 'btn btn-success']) !!}
        {{ link_to_route('users.show', __('app.cancel'), [$user], ['class' => 'btn btn-default']) }}
    </div>
    {{ Form::close() }}
</div>
