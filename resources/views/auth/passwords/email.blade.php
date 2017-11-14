@extends('auth.index')

@section('content')
    <div class="login-container">
        <div class="page-container">
            <div class="page-content">
                <div class="content-wrapper">
                    <div class="content">
                        {!! Form::open(['route' => 'post-forgot-password']) !!}
                            <div class="panel panel-body login-form">
                                <div class="text-center">
                                    <div class="icon-object border-warning text-warning"><i class="icon-spinner11"></i></div>
                                    <h5 class="content-group">
                                        {{ $options['reset_title'] or '' }}
                                        @isset($options['reset_subtitle'])
                                        <small class="display-block">{{ $options['reset_subtitle'] }}</small>
                                        @endisset
                                    </h5>
                                </div>


                                @if (session()->has('message'))
                                    <div class="alert alert-{{ session('message.type') }}">{{ session('message.msg') }}</div>
                                @else
                                <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'E-mail']) !!}
                                    <div class="form-control-feedback">
                                        <i class="icon-mail5 text-muted"></i>
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="help-block">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <button type="submit" class="btn bg-blue btn-block">{!! $options['reset_btn_reset'] !!}</button>
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
