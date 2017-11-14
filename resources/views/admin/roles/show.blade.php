@extends('admin.layouts.template')

@section('content')
    <div class="panel panel-white">
        <div class="panel-heading">
            <h5 class="panel-title">Информация о роли</h5>
            <div class="heading-elements">
            </div>
        </div>

        <div class="panel-body">
            <div class="form-horizontal">
                <div class="form-group">
                    <label class="control-label col-lg-2">Системное имя:</label>
                    <div class="col-lg-10">
                        <div class="form-control-static">{{ $role->slug }}</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Название:</label>
                    <div class="col-lg-10">
                        <div class="form-control-static">{{ $role->name }}</div>
                    </div>
                </div>
                @if($role->description)
                <div class="form-group">
                    <label class="control-label col-lg-2">Описание:</label>
                    <div class="col-lg-10">
                        <div class="form-control-static">{{ $role->description }}</div>
                    </div>
                </div>
                @endif
                <div class="form-group">
                    <label class="control-label col-lg-2">Разрешенные действия:</label>
                    <div class="col-lg-10">
                        <div class="form-control-static">
                            @if($permissions->isEmpty())
                                <span class="label label-success">Может все!!!</span>
                            @else
                                @foreach($permissions as $permission)
                                    <span class="label label-info mb-5">{{ $permission->name }}</span>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection