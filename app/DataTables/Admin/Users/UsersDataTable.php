<?php

namespace App\DataTables\Admin\Users;

use App\User;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class UsersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'admin.users.datatable.actions')
            ->editColumn('activation', function (User $user) {
                if ($user->activations->first()->completed) {
                    return '<div class="label label-success">Да</div>';
                } else {
                    return '<div class="label label-default">Нет</div>';
                }
            })
            ->editColumn('created_at', function (User $user) {
                return $user->created_at->format('d.m.Y H:i');
            })
            ->editColumn('roles', function (User $user) {
                return $user->roles->map(function ($role) {
                    return '<span class="label label-primary m-5">' . $role->name . '</span>';
                })->implode('<br />');
            })
            ->rawColumns(['activation', 'action', 'roles']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model
            ->newQuery()
            ->with(['activations', 'roles'])
            ->select($this->getColumnsDb());
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumnsTitle())
            ->minifiedAjax()
            ->addAction(['title' => 'Действия'])
            ->parameters([
                'buttons' => [
                    //'create',
                    'export',
                    //'print',
                    //'reset',
                    //'reload',
                ],
                'order'   => [
                    [$this->getColumnOrderNumber('created_at'), 'desc']
                ]
            ]);
    }

    protected function getColumnOrderNumber($column)
    {
        foreach ($this->getColumnsTitle() as $index => $col) {
            if ($col['name'] == $column)
                return $index;
        }
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumnsTitle()
    {
        return [
            [
                'name'  => 'id',
                'data'  => 'id',
                'title' => '№'
            ],
            [
                'name'  => 'name',
                'data'  => 'name',
                'title' => 'Имя'
            ],
            [
                'name'  => 'email',
                'data'  => 'email',
                'title' => 'E-mail'
            ],
            [
                'name'       => 'activation',
                'data'       => 'activation',
                'title'      => 'Активирован',
                'orderable'  => false,
                'searchable' => false
            ],
            [
                'name'       => 'roles',
                'data'       => 'roles',
                'title'      => 'Роли',
                'orderable'  => false,
                'searchable' => false
            ],
            [
                'name'  => 'created_at',
                'data'  => 'created_at',
                'title' => 'Дата регистрации'
            ],
        ];
    }

    protected function getColumnsDb()
    {
        return [
            'id', 'name', 'email', 'created_at'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'users_' . time();
    }
}
