@extends('admin.layouts.template')

@section('content')
    <div class="panel panel-white">
        <div class="panel-heading">
            <h5 class="panel-title">Список разрешений</h5>
            @if(Sentinel::getUser()->hasAccess('admin.permissions.create'))
                <div class="heading-elements">
                    <a href="{{ route('admin.permissions.create') }}" class="btn btn-primary heading-btn"><i class="icon-plus2"></i> Создать разрешение</a>
                </div>
            @endif
        </div>
        {!! $dataTable->table() !!}
    </div>
@endsection

@push('scripts')
{!! $dataTable->scripts() !!}
@endpush