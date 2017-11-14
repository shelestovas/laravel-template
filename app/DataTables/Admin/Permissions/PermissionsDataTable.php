<?php

namespace App\DataTables\Admin\Permissions;

use App\Permission;
use App\User;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class PermissionsDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'admin.permissions.datatable.actions')
            ->editColumn('created_at', function (Permission $role) {
                return $role->created_at->format('d.m.Y H:i');
            })
            ->editColumn('updated_at', function (Permission $role) {
                return $role->updated_at->format('d.m.Y H:i');
            })
            ->rawColumns(['action']);
    }


    /**
     * @param Permission $model
     * @return mixed
     */
    public function query(Permission $model)
    {
        return $model->newQuery()->select($this->getColumnsDb());
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
                    'export',
                ],
            ]);
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
                'name'  => 'slug',
                'data'  => 'slug',
                'title' => 'Системное имя'
            ],
            [
                'name'  => 'name',
                'data'  => 'name',
                'title' => 'Название'
            ],
            [
                'name'  => 'created_at',
                'data'  => 'created_at',
                'title' => 'Дата создания'
            ],
            [
                'name'  => 'updated_at',
                'data'  => 'updated_at',
                'title' => 'Дата обноволения',
            ],
        ];
    }

    protected function getColumnsDb()
    {
        return [
            'id', 'slug', 'name', 'created_at', 'updated_at'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'permissions_' . time();
    }
}
