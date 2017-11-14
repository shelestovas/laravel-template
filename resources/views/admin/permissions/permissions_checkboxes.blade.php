@foreach($permissions as $index => $permission)
    <div class="panel panel-default">
        <div class="panel-heading">
            <h6 class="panel-title">{{ ucfirst($index) }} interface</h6>
        </div>
        <div class="panel-body">
            @foreach($permission as $item)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            @foreach($item as $row)
                                <div class="col-md-4">
                                    <div class="checkbox">
                                        <label>
                                            {!! Form::checkbox('permissions[]', $row->slug, !isset($model->permissions) ? 0 : isset($model->permissions[$row->slug]), ['class' => 'styled']) !!}
                                            {{ $row->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endforeach