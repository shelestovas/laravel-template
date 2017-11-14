@extends('admin.layouts.template')

@section('content')
    <div class="panel panel-white">

        <div class="panel-body">

            @include('admin.users.settings.submenu')

            {!! Form::open(['route' => 'admin.users.settings.reset', 'class' => 'form-horizontal']) !!}
            <div class="form-group{{ $errors->has('reset_title') ? ' has-error' : '' }}">
                <label class="control-label col-lg-2">Заголовок:</label>
                <div class="col-lg-10">
                    {!! Form::text('reset_title', isset($options['reset_title']) ? $options['reset_title'] : '', ['class' => 'form-control']) !!}
                    @if ($errors->has('reset_title'))
                        <span class="help-block">{{ $errors->first('reset_title') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-2">Под заголовок:</label>
                <div class="col-lg-10">
                    {!! Form::text('reset_subtitle', isset($options['reset_subtitle']) ? $options['reset_subtitle'] : '', ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group{{ $errors->has('reset_btn_reset') ? ' has-error' : '' }}">
                <label class="control-label col-lg-2">Текст кнопки восстановления:</label>
                <div class="col-lg-10">
                    {!! Form::text('reset_btn_reset', isset($options['reset_btn_reset']) ? $options['reset_btn_reset'] : '', ['class' => 'form-control']) !!}
                    @if ($errors->has('reset_btn_reset'))
                        <span class="help-block">{{ $errors->first('reset_btn_reset') }}</span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('new_password_title') ? ' has-error' : '' }}">
                <label class="control-label col-lg-2">Заголовок ввода нового пароля:</label>
                <div class="col-lg-10">
                    {!! Form::text('new_password_title', isset($options['new_password_title']) ? $options['new_password_title'] : '', ['class' => 'form-control']) !!}
                    @if ($errors->has('new_password_title'))
                        <span class="help-block">{{ $errors->first('new_password_title') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-2">Под заголовок ввода нового пароля:</label>
                <div class="col-lg-10">
                    {!! Form::text('new_password_subtitle', isset($options['new_password_subtitle']) ? $options['new_password_subtitle'] : '', ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group{{ $errors->has('new_password_btn') ? ' has-error' : '' }}">
                <label class="control-label col-lg-2">Текст кнопки ввода нового пароля:</label>
                <div class="col-lg-10">
                    {!! Form::text('new_password_btn', isset($options['new_password_btn']) ? $options['new_password_btn'] : '', ['class' => 'form-control']) !!}
                    @if ($errors->has('new_password_btn'))
                        <span class="help-block">{{ $errors->first('new_password_btn') }}</span>
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