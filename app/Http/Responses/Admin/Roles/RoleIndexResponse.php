<?php

namespace App\Http\Responses\Admin\Roles;

use Illuminate\Contracts\Support\Responsable;

class RoleIndexResponse implements Responsable
{

    protected $dataTable;

    /**
     * ProfileIndexResponse constructor.
     * @param $user
     */
    public function __construct($dataTable)
    {
        $this->dataTable = $dataTable;
    }


    public function toResponse($request)
    {

        return $this->dataTable->render('admin.roles.index', $this->toResponseParameters());
    }

    public function toResponseParameters()
    {
        return [
            'title'      => 'Роли пользователей',
            'page_title' => 'Список всех ролей',
        ];
    }

}