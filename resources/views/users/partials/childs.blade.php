<div class="panel panel-default" style="display:block">
    <div class="panel-heading">
        <hr>
        <form id="list">
        @can ('edit', $user)
        @endcan
        <h3 class="panel-title">{{ __('user.childs') }} ({{ $user->childs->count() }})</h3>
    </div>
    <ul id="childs1" value="childs1" class="list-group">
        @forelse($user->childs as $child)
            <li id="list-group-item" class="list-group-item" style="display:flex;align-items:center;justify-content:space-between;">
                <div>
                {{ $child->profileLink() }}({{ $child->gender }})
                </div>
                <div>
                    <form method="POST" class="" action="{{ route('users.destroy', $child->id) }}">
                    @csrf
                    @method("DELETE")
                        <button type="submit" class="btn btn-danger btn-default btn-sm">Delete User</button>
                    </form>

                </div>
                <!-- {{ Form::submit(__($child->id), ['name' => 'destroy','class' => 'btn btn-danger btn-xs',]) }} -->
                <!-- {{ link_to_route('users.destroy', __('user.delete_child'), [$child->id], ['class' => 'btn btn-danger btn-xs']) }} -->
            </li>
        @empty
            <li class="list-group-item">{{ __('app.childs_were_not_recorded') }}</li>
        @endforelse
        @can('edit', $user)
        @if (request('action') == 'add_child')
        <li class="list-group-item">
            {{ Form::open(['route' => ['family-actions.add-child', $user->id]]) }}
            <div id="child1" class="row">
                <div class="col-md-8">
                    {!! FormField::text('add_child_name', ['id'=>'childs1','label' => __('user.child_name')]) !!}
                </div>
                <div class="col-md-4">
                    {!! FormField::radios('add_child_gender_id', [1 => __('app.male'), 2 => __('app.female')], ['label' => __('user.child_gender')]) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    {!! FormField::select('add_child_parent_id', $usersMariageList, ['label' => __('user.add_child_from_existing_couples', ['name' => $user->name]), 'placeholder' => __('app.unknown')]) !!}
                </div>
                <div class="col-md-4">
                    {!! FormField::text('add_child_birth_order', ['label' => __('user.birth_order'), 'type' => 'number', 'min' => 1]) !!}
                </div>
            </div>
            {{ Form::submit(__('user.add_child'), ['class' => 'btn btn-success btn-sm']) }}
            {{ link_to_route('users.show', __('app.cancel'), [$user->id], ['class' => 'btn btn-default btn-sm']) }}
            <!-- {{ Form::submit(__('user.replace_delete_button'), ['name' => 'replace_delete_button','class' => 'btn btn-danger',]) }} -->
            {{ Form::close() }}
        </li>
        @endif
        @endcan
    </ul>
    <p></p>
    @can ('edit', $user)
    <div class="pull-right" style="margin:10px; margin-left:625px;"> 
            {{ link_to_route('users.show', __('user.add_child'), [$user->id, 'action' => 'add_child'], ['class' => 'btn btn-info btn-sm']) }}
    </div>
    @endcan
</div>
<hr>