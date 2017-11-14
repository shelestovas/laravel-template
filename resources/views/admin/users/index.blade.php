@extends('admin.layouts.template')

@section('content')
    <div class="panel panel-white">
        <div class="panel-heading">
            <h5 class="panel-title">Список пользователей</h5>

            @if(Sentinel::getUser()->hasAccess('admin.users.create'))
                <div class="heading-elements">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary heading-btn"><i class="icon-plus2"></i> Добавить пользователя</a>
                </div>
            @endif
        </div>
        {!! $dataTable->table() !!}
    </div>
@endsection

@push('scripts')
{!! $dataTable->scripts() !!}
@endpush