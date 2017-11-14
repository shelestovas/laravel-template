@extends('admin.layouts.template')

@section('content')
    <div class="panel panel-white">
        <div class="panel-heading">
            <h5 class="panel-title">
                Создание новой роли
                @if(Sentinel::getUser()->hasAccess('admin.role.create'))
                    <a href="{{ route('admin.role.create') }}" class="label label-primary text-white position-right">Добавить новую роль</a>
                @endif
            </h5>
            @if(Sentinel::getUser()->hasAccess('admin.role.destroy'))
                <div class="heading-elements">
                    {!! Form::open(array('url' => route('admin.role.destroy', ['role' => $role->id]), 'method' => 'DELETE')) !!}
                    <button type="submit" class="btn btn-danger btn-icon remove-item-btn">Удалить</button>
                    {!! Form::close() !!}
                </div>
            @endif
        </div>

        <div class="panel-body">
            {!! Form::open(['route' => ['admin.role.update', $role->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
            <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                <label class="control-label col-lg-2">Системное имя</label>
                <div class="col-lg-10">
                    {!! Form::text('slug', $role->slug, ['class' => 'form-control']) !!}
                    @if ($errors->has('slug'))
                        <span class="help-block">{{ $errors->first('slug') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label class="control-label col-lg-2">Название:</label>
                <div class="col-lg-10">
                    {!! Form::text('name', $role->name, ['class' => 'form-control']) !!}
                    @if ($errors->has('name'))
                        <span class="help-block">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-2">Доступные действия:</label>
                <div class="col-lg-10">
                    @include('admin.permissions.permissions_checkboxes', ['model' => $role])
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-2"></label>
                <div class="col-lg-10">
                    <button type="submit" class="btn btn-success"><i class="icon-sync"></i> Обновить</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>

    </div>
@endsection