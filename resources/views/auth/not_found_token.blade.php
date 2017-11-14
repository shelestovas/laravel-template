@extends('auth.index')

@section('content')
    <div class="login-container">
        <div class="page-container">
            <div class="page-content">
                <div class="content-wrapper">
                    <div class="content">

                        <!-- Error title -->
                        <div class="text-center content-group">
                            <h1 class="error-title">Упс...</h1>
                            <h5>При активации аккаунта что-то пошло не так, возможные причины:</h5>
                                <div>Вы перешли по несуществующей ссылке.</div>
                                <div>Аккаунт который Вы хотите активировать не существует.</div>
                                <div>Аккаунт который Вы хотите активировать уже активирован.</div>
                        </div>
                        <!-- /error title -->


                        <!-- Error content -->
                        <div class="row">
                            <div class="col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-3">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href="{{ route('login') }}" class="btn btn-primary btn-block content-group">Авторизация</a>
                                        </div>

                                        <div class="col-sm-6">
                                            <a href="{{ route('register') }}" class="btn btn-default btn-block content-group">Регистрация</a>
                                        </div>
                                    </div>
                            </div>
                        </div>

                        @include('auth.footer')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
