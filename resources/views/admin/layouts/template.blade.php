<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>
        {{ \Config::get('app.name') }}
        @if(isset($title))
            - {{ $title }}
        @endif
    </title>

    {!! Assets::css() !!}
</head>

<body>

@include('admin.layouts.header_line')

<div class="page-container">
    <div class="page-content">
        @include('admin.layouts.sidebar_menu')
        <div class="content-wrapper">
            @include('admin.layouts.content_title')
            <div class="content">
                @yield('content')
                @include('admin.layouts.footer')
            </div>
        </div>
    </div>
</div>

{!! Assets::js() !!}
@stack('scripts')

</body>
</html>
