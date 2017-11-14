@extends('admin.layouts.template')

@section('content')
    <div class="panel panel-white">
        <div class="panel-heading">
            <h5 class="panel-title">
                Редактирование пользователя
                @if(Sentinel::getUser()->hasAccess('admin.users.create'))
                    <a href="{{ route('admin.users.create') }}" class="label label-primary text-white position-right">Добавить нового пользователя</a>
                @endif
            </h5>

            @if(Sentinel::getUser()->hasAccess('admin.users.destroy'))
                <div class="heading-elements">
                    {!! Form::open(array('url' => route('admin.users.destroy', ['user' => $user->id]), 'method' => 'DELETE')) !!}
                    <button type="submit" class="btn btn-danger btn-icon remove-item-btn">Удалить</button>
                    {!! Form::close() !!}
                </div>
            @endif
        </div>

        <div class="panel-body">
            {!! Form::open(['route' => ['admin.users.update', $user->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label class="control-label col-lg-2">Имя:</label>
                <div class="col-lg-10">
                    {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                    @if ($errors->has('name'))
                        <span class="help-block">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label class="control-label col-lg-2">E-mail:</label>
                <div class="col-lg-10">
                    {!! Form::email('email', $user->email, ['class' => 'form-control']) !!}
                    @if ($errors->has('email'))
                        <span class="help-block">{{ $errors->first('email') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label class="control-label col-lg-2">Пароль:</label>
                <div class="col-lg-10">
                    <div class="label-indicator-absolute">
                        {!! Form::text('password', null, ['class' => 'form-control']) !!}
                        <span class="label password-indicator-label-absolute"></span>
                    </div>
                    @if ($errors->has('password'))
                        <span class="help-block">{{ $errors->first('password') }}</span>
                    @endif
                    <button type="button" class="btn btn-info generate-label-absolute mt-20">Сгенерировать новый пароль</button>
                </div>
            </div>
            <div class="form-group{{ $errors->has('roles') ? ' has-error' : '' }}">
                <label class="control-label col-lg-2">Роли пользователя:</label>
                <div class="col-lg-10">
                    {!! Form::select('roles[]', $roles, $user->roles()->pluck('id'), ['class' => 'select2', 'data-placeholder' => 'Выберите группы для пользователя', 'multiple' => true]) !!}
                    @if ($errors->has('roles'))
                        <span class="help-block">{{ $errors->first('roles') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-2">Индивидульные настройки доступных действий:</label>
                <div class="col-lg-10">
                    @include('admin.permissions.permissions_checkboxes', ['model' => $user])
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