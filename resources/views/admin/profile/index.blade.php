@extends('admin.layouts.template')

@section('content')

    <div class="panel panel-default">

        <div class="panel-body">

            {!! Form::open(array('route' => 'admin.profile.update', 'class' => 'form-horizontal')) !!}
            <div class="form-group has-feedback">
                {!! Form::label('name', 'Имя пользователя:', array('class' => 'col-lg-3 control-label')) !!}
                <div class="col-lg-9">
                    {!! Form::text('name', $user->name, array('class' => 'form-control', 'placeholder' => 'Например: Иванов Иван')) !!}
                    @if($errors->has('name'))
                        @foreach($errors->get('name') as $error)
                            <label id="name-error" class="validation-error-label" for="name">{{ $error }}</label>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="form-group has-feedback">
                {!! Form::label('email', 'Логин(E-mail):', array('class' => 'col-lg-3 control-label')) !!}
                <div class="col-lg-9">
                    {!! Form::text('email', $user->email, array('class' => 'form-control', 'placeholder' => 'Например: user@yandex.ru', 'readonly' => true)) !!}
                    @if($errors->has('email'))
                        @foreach($errors->get('email') as $error)
                            <label id="email-error" class="validation-error-label" for="email">{{ $error }}</label>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="form-group has-feedback">
                {!! Form::label('old_password', 'Старый пароль:', array('class' => 'col-lg-3 control-label')) !!}
                <div class="col-lg-9">
                    {!! Form::password('old_password', array('class' => 'form-control', 'placeholder' => '*********')) !!}
                    @if($errors->has('old_password'))
                        @foreach($errors->get('old_password') as $error)
                            <label id="old_password-error" class="validation-error-label" for="old_password">{{ $error }}</label>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="form-group has-feedback">
                {!! Form::label('password', 'Новый пароль:', array('class' => 'col-lg-3 control-label')) !!}
                <div class="col-lg-9">
                    {!! Form::password('password', array('class' => 'form-control', 'placeholder' => '*********')) !!}
                    @if($errors->has('password'))
                        @foreach($errors->get('password') as $error)
                            <label id="password-error" class="validation-error-label" for="password">{{ $error }}</label>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="form-group has-feedback">
                {!! Form::label('password_confirmation', 'Подтверждение пароля:', array('class' => 'col-lg-3 control-label')) !!}
                <div class="col-lg-9">
                    {!! Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => '*********')) !!}
                    @if($errors->has('password_confirmation'))
                        @foreach($errors->get('password_confirmation') as $error)
                            <label id="password_confirmation-error" class="validation-error-label" for="password_confirmation">{{ $error }}</label>
                        @endforeach
                    @endif
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Обновить</button>
            {!! Form::close() !!}
        </div>

    </div>
@endsection