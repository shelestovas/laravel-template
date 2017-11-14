@extends('admin.layouts.template')

@section('content')
    <div class="panel panel-white">

        <div class="panel-body">

            @include('admin.users.settings.submenu')

            {!! Form::open(['route' => 'admin.users.settings.auth', 'class' => 'form-horizontal']) !!}
            <div class="form-group{{ $errors->has('auth_title') ? ' has-error' : '' }}">
                <label class="control-label col-lg-2">Заголовок:</label>
                <div class="col-lg-10">
                    {!! Form::text('auth_title', isset($options['auth_title']) ? $options['auth_title'] : '', ['class' => 'form-control']) !!}
                    @if ($errors->has('auth_title'))
                        <span class="help-block">{{ $errors->first('auth_title') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-2">Под заголовок:</label>
                <div class="col-lg-10">
                    {!! Form::text('auth_subtitle', isset($options['auth_subtitle']) ? $options['auth_subtitle'] : '', ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group{{ $errors->has('auth_btn_login') ? ' has-error' : '' }}">
                <label class="control-label col-lg-2">Текст кнопки авторизации:</label>
                <div class="col-lg-10">
                    {!! Form::text('auth_btn_login', isset($options['auth_btn_login']) ? $options['auth_btn_login'] : '', ['class' => 'form-control']) !!}
                    @if ($errors->has('auth_btn_login'))
                        <span class="help-block">{{ $errors->first('auth_btn_login') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('auth_btn_register') ? ' has-error' : '' }}">
                <label class="control-label col-lg-2">Текст кнопки регистрации:</label>
                <div class="col-lg-10">
                    {!! Form::text('auth_btn_register', isset($options['auth_btn_register']) ? $options['auth_btn_register'] : '', ['class' => 'form-control']) !!}
                    @if ($errors->has('auth_btn_register'))
                        <span class="help-block">{{ $errors->first('auth_btn_register') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('auth_reset_link') ? ' has-error' : '' }}">
                <label class="control-label col-lg-2">Текст ссылки восстановления пароля:</label>
                <div class="col-lg-10">
                    {!! Form::text('auth_reset_link', isset($options['auth_reset_link']) ? $options['auth_reset_link'] : '', ['class' => 'form-control']) !!}
                    @if ($errors->has('auth_reset_link'))
                        <span class="help-block">{{ $errors->first('auth_reset_link') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-2">Показать текст об обработке персональных данных:</label>
                <div class="col-lg-10">

                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('auth_policy', 1, isset($options['auth_policy']) ? $options['auth_policy'] : 0, ['class' => 'styled']) !!}
                        </label>
                    </div>
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