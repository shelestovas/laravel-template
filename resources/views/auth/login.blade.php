@extends('auth.index')

@section('content')
    <div class="login-container">
        <div class="page-container">
            <div class="page-content">
                <div class="content-wrapper">
                    <div class="content">
                        {!! Form::open(['route' => 'login']) !!}
                            <div class="panel panel-body login-form">
                                <div class="text-center">
                                    <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                                    <h5 class="content-group">
                                        {{ $options['auth_title'] or '' }}
                                        @isset($options['auth_subtitle'])
                                            <small class="display-block">{{ $options['auth_subtitle'] }}</small>
                                        @endisset
                                    </h5>
                                </div>

                                @if (session()->has('message'))
                                    <div class="alert alert-{{ session('message.type') }}">{{ session('message.msg') }}</div>
                                @endif

                                <div class="form-group has-feedback has-feedback-left{{ $errors->has('email') ? ' has-error' : '' }}">
                                    {!! Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'E-mail']) !!}
                                    <div class="form-control-feedback">
                                        <i class="icon-user text-muted"></i>
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="help-block">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <div class="form-group has-feedback has-feedback-left{{ $errors->has('password') ? ' has-error' : '' }}">
                                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Пароль']) !!}
                                    <div class="form-control-feedback">
                                        <i class="icon-lock2 text-muted"></i>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="help-block">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>

                                <div class="form-group login-options">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label class="checkbox-inline">
                                                {!! Form::checkbox('remember', 1, 1, ['class' => 'styled']) !!}
                                                <label for="remember"> Запомнить меня </label>
                                            </label>
                                        </div>

                                        <div class="col-sm-6 text-right">
                                            <a href="{{ route('forgot-password') }}">{!! $options['auth_reset_link'] !!}</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn bg-blue btn-block">{!! $options['auth_btn_login'] !!}</button>
                                </div>

                                @if(isset($options['register_enable']))
                                    @if($options['register_enable'] == 1)
                                    <div class="content-divider text-muted form-group"><span>Нет аккаунта?</span></div>
                                    <a href="{{ route('register') }}" class="btn btn-default btn-block content-group">{!! $options['auth_btn_register'] !!}</a>
                                    @endif
                                @endif
                                @isset($options['auth_policy'])
                                    @if($options['auth_policy'] == 1)
                                        <span class="help-block text-center no-margin">Пользуясь сервисом вы даете согласие на обработку <a href="#" data-toggle="modal" data-toggle="modal" data-target="#modal_policy">персональных данных</a></span>
                                        @include('auth.policy')
                                    @endif
                                @endisset

                            </div>
                        {!! Form::close() !!}

                        @include('auth.footer')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
