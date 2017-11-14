<ul class="icons-list">
    @if(Sentinel::getUser()->hasAccess('admin.permissions.edit'))
        <li><a href="{{ route('admin.permissions.edit', ['permissions' => $id]) }}" class="btn text-white btn-primary btn-icon"><i class="icon-pencil7"></i></a></li>
    @endif
    @if(Sentinel::getUser()->hasAccess('admin.permissions.destroy'))
        <li>
            {!! Form::open(array('url' => route('admin.permissions.destroy', ['permissions' => $id]), 'class' => 'datatable-remove-row', 'method' => 'DELETE')) !!}
            <button type="submit" class="btn btn-danger btn-icon"><i class="icon-trash"></i></button>
            {!! Form::close() !!}
        </li>
    @endif
</ul>