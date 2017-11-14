@extends('admin.layouts.template')

@section('content')
    <div class="panel panel-white">
        <div class="panel-heading">
            <h5 class="panel-title">Информация о пользователе</h5>
            <div class="heading-elements">
            </div>
        </div>

        <div class="panel-body">
            <div class="form-horizontal">
                <div class="form-group">
                    <label class="control-label col-lg-2">Имя:</label>
                    <div class="col-lg-10">
                        <div class="form-control-static">{{ $user->name }}</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">E-mail:</label>
                    <div class="col-lg-10">
                        <div class="form-control-static">{{ $user->email }}</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Дата регистрации:</label>
                    <div class="col-lg-10">
                        <div class="form-control-static">{{ $user->created_at->format('d.m.Y H:i') }}</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Активирован:</label>
                    <div class="col-lg-10">
                        <div class="form-control-static">
                            @if($user->activations->first()->completed)
                                <span class="label label-primary">Да</span>
                            @else
                                <span class="label label-default">Нет</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Роли пользователя:</label>
                    <div class="col-lg-10">
                        <div class="form-control-static">
                            @foreach($user->roles as $role)
                                <a href="{{ route('admin.role.edit', ['role' => $role->id]) }}"><span class="label label-primary">{{ $role->name }}</span></a>
                            @endforeach
                        </div>
                    </div>
                </div>

                @unless($permissions->isEmpty())
                <div class="form-group">
                    <label class="control-label col-lg-2">Индивидульные настройки доступных действий:</label>
                    <div class="col-lg-10">
                        <div class="form-control-static">
                            @foreach($permissions as $permission)
                                <span class="label label-info mb-5">{{ $permission->name }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endunless
            </div>
        </div>

    </div>
@endsection