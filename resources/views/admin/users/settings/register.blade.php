@extends('admin.layouts.template')

@section('content')
    <div class="panel panel-white">

        <div class="panel-body">

            @include('admin.users.settings.submenu')

            {!! Form::open(['route' => 'admin.users.settings.register', 'class' => 'form-horizontal']) !!}
            <div class="form-group">
                <label class="control-label col-lg-2">Разрешить регистрацию:</label>
                <div class="col-lg-10">

                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('register_enable', 1, isset($options['register_enable']) ? $options['register_enable'] : 0, ['class' => 'styled']) !!}
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group{{ $errors->has('register_role') ? ' has-error' : '' }}">
                <label class="control-label col-lg-2">Роль по умолчанию для нового пользователя:</label>
                <div class="col-lg-10">
                    {!! Form::select('register_role', $roles, isset($options['register_role']) ? $options['register_role'] : null, ['class' => 'select2', 'placeholder' => '', 'data-placeholder' => 'Выберите роль']) !!}
                    @if ($errors->has('register_role'))
                        <span class="help-block">{{ $errors->first('register_role') }}</span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('register_title') ? ' has-error' : '' }}">
                <label class="control-label col-lg-2">Заголовок:</label>
                <div class="col-lg-10">
                    {!! Form::text('register_title', isset($options['register_title']) ? $options['register_title'] : '', ['class' => 'form-control']) !!}
                    @if ($errors->has('register_title'))
                        <span class="help-block">{{ $errors->first('register_title') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-2">Под заголовок:</label>
                <div class="col-lg-10">
                    {!! Form::text('register_subtitle', isset($options['register_subtitle']) ? $options['register_subtitle'] : '', ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group{{ $errors->has('register_btn_register') ? ' has-error' : '' }}">
                <label class="control-label col-lg-2">Текст кнопки регистрации:</label>
                <div class="col-lg-10">
                    {!! Form::text('register_btn_register', isset($options['register_btn_register']) ? $options['register_btn_register'] : '', ['class' => 'form-control']) !!}
                    @if ($errors->has('register_btn_register'))
                        <span class="help-block">{{ $errors->first('register_btn_register') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('register_rule') ? ' has-error' : '' }}">
                <label class="control-label col-lg-2">Текст правил:</label>
                <div class="col-lg-10">
                    {!! Form::textarea('register_rule', isset($options['register_rule']) ? $options['register_rule'] : '', ['class' => 'form-control ckeditor']) !!}
                    @if ($errors->has('register_rule'))
                        <span class="help-block">{{ $errors->first('register_rule') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-2"></label>
                <div class="col-lg-10">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </div>
            {!! Form::close() !!}

        </div>
    </div>
@endsection