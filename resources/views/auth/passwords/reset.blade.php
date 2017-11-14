@extends('auth.index')

@section('content')
    <div class="login-container">
        <div class="page-container">
            <div class="page-content">
                <div class="content-wrapper">
                    <div class="content">
                        {!! Form::open() !!}

                        <div class="panel panel-body login-form">
                            <div class="text-center">
                                <div class="icon-object border-warning text-warning"><i class="icon-spinner11"></i></div>
                                <h5 class="content-group">
                                    {{ $options['new_password_title'] or '' }}
                                    @isset($options['new_password_subtitle'])
                                    <small class="display-block">{{ $options['new_password_subtitle'] }}</small>
                                    @endisset
                                </h5>
                            </div>


                            <div class="form-group has-feedback has-feedback-left{{ $errors->has('password') ? ' has-error' : '' }}">
                                {!! Form::password('password', array('id' => 'password', 'class' => 'form-control', 'placeholder' => 'Новый пароль')) !!}
                                <div class="form-control-feedback">
                                    <i class="icon-user-lock text-muted"></i>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="help-block">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <div class="form-group has-feedback has-feedback-left{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                {!! Form::password('password_confirmation', array('id' => 'password_confirmation', 'class' => 'form-control', 'placeholder' => 'Повторите новый пароль')) !!}
                                <div class="form-control-feedback">
                                    <i class="icon-user-lock text-muted"></i>
                                </div>
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div>

                            <button type="submit" class="btn bg-blue btn-block">{!! $options['new_password_btn'] !!}</button>

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
