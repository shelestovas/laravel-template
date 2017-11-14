<ul class="icons-list">
    @if(Sentinel::getUser()->hasAccess('admin.role.show'))
        <li><a href="{{ route('admin.role.show', ['role' => $id]) }}" class="btn text-white bg-teal-400 btn-icon"><i class="icon-eye"></i></a></li>
    @endif
    @if($id != 1)
        @if(Sentinel::getUser()->hasAccess('admin.role.edit'))
            <li><a href="{{ route('admin.role.edit', ['role' => $id]) }}" class="btn text-white btn-primary btn-icon"><i class="icon-pencil7"></i></a></li>
        @endif
        @if(Sentinel::getUser()->hasAccess('admin.role.destroy'))
            <li>
                {!! Form::open(array('url' => route('admin.role.destroy', ['role' => $id]), 'class' => 'datatable-remove-row', 'method' => 'DELETE')) !!}
                <button type="submit" class="btn btn-danger btn-icon"><i class="icon-trash"></i></button>
                {!! Form::close() !!}
            </li>
        @endif
    @endif
</ul>