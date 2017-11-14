<ul class="icons-list">
    @if(Sentinel::getUser()->hasAccess('admin.users.show'))
        <li><a href="{{ route('admin.users.show', ['user' => $id]) }}" class="btn text-white bg-teal-400 btn-icon"><i class="icon-eye"></i></a></li>
    @endif
    @if($id != 1)
        @if(Sentinel::getUser()->hasAccess('admin.users.edit'))
            <li><a href="{{ route('admin.users.edit', ['user' => $id]) }}" class="btn text-white btn-primary btn-icon"><i class="icon-pencil7"></i></a></li>
        @endif
        @if(Sentinel::getUser()->hasAccess('admin.users.destroy'))
            <li>
                {!! Form::open(array('url' => route('admin.users.destroy', ['user' => $id]), 'class' => 'datatable-remove-row', 'method' => 'DELETE')) !!}
                <button type="submit" class="btn btn-danger btn-icon"><i class="icon-trash"></i></button>
                {!! Form::close() !!}
            </li>
        @endif
    @endif
</ul>