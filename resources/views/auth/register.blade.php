@extends('auth.index')

@section('content')
    <div class="login-container">
        <div class="page-container">
            <div class="page-content">
                <div class="content-wrapper">
                    <div class="content">
                        {!! Form::open(['route' => 'register']) !!}
                            <div class="panel panel-body login-form">

                                @if (session()->has('message'))
                                    <div class="text-center">
                                        <div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
                                        <h5 class="content-group">Спасибо <small class="display-block">Остался последний шаг</small></h5>
                                    </div>

                                    <div class="alert alert-{{ session('message.type') }}">{{ session('message.msg') }}</div>
                                @else

                                <div class="text-center">
                                    <div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
                                    <h5 class="content-group">
                                        {{ $options['register_title'] or '' }}
                                        @isset($options['register_subtitle'])
                                        <small class="display-block">{{ $options['register_subtitle'] }}</small>
                                        @endisset
                                    </h5>
                                </div>


                                <div class="content-divider text-muted form-group"><span>Ваши данные</span></div>


                                <div class="form-group has-feedback has-feedback-left{{ $errors->has('email') ? ' has-error' : '' }}">
                                    {!! Form::email('email', '', array('id' => 'email', 'class' => 'form-control', 'placeholder' => 'Ваш E-mail адрес')) !!}
                                    <div class="form-control-feedback">
                                        <i class="icon-mention text-muted"></i>
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="help-block">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <div class="form-group has-feedback has-feedback-left{{ $errors->has('password') ? ' has-error' : '' }}">
                                    {!! Form::password('password', array('id' => 'password', 'class' => 'form-control', 'placeholder' => 'Пароль')) !!}
                                    <div class="form-control-feedback">
                                        <i class="icon-user-lock text-muted"></i>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="help-block">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>

                                <div class="form-group has-feedback has-feedback-left{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    {!! Form::password('password_confirmation', array('id' => 'password_confirmation', 'class' => 'form-control', 'placeholder' => 'Повторите пароль')) !!}
                                    <div class="form-control-feedback">
                                        <i class="icon-user-lock text-muted"></i>
                                    </div>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('terms') ? ' has-error' : '' }}">
                                    <div class="checkbox">
                                        <label>
                                            {!! Form::checkbox('terms', 1, 0, ['class' => 'styled']) !!}
                                            Я согласен с <a href="#">правилами</a>
                                        </label>
                                        @if ($errors->has('terms'))
                                            <span class="help-block">{{ $errors->first('terms') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <button type="submit" class="btn bg-teal btn-block btn-lg">{!! $options['register_btn_register'] !!}</button>
                                @endif
                                <a href="{{ route('login') }}" class="btn btn-default btn-block mt-20"><i class="icon-arrow-left13 position-left"></i> Назад</a>
                            </div>
                        {!! Form::close() !!}

                        @include('auth.footer')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
