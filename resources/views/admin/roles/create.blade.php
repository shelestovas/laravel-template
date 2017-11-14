@extends('admin.layouts.template')

@section('content')
    <div class="panel panel-white">
        <div class="panel-heading">
            <h5 class="panel-title">Создание новой роли</h5>
        </div>

        <div class="panel-body">
            {!! Form::open(['route' => 'admin.role.store', 'class' => 'form-horizontal']) !!}
            <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                <label class="control-label col-lg-2">Системное имя</label>
                <div class="col-lg-10">
                    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
                    @if ($errors->has('slug'))
                        <span class="help-block">{{ $errors->first('slug') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label class="control-label col-lg-2">Название:</label>
                <div class="col-lg-10">
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    @if ($errors->has('name'))
                        <span class="help-block">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-2">Доступные действия:</label>
                <div class="col-lg-10">
                    @include('admin.permissions.permissions_checkboxes')
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-2"></label>
                <div class="col-lg-10">
                    <button type="submit" class="btn btn-success"><i class="icon-plus2"></i> Создать</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>

    </div>
@endsection