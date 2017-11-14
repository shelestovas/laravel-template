<?php

namespace App\Http\Responses\Admin\Users;

use Illuminate\Contracts\Support\Responsable;

class UserIndexResponse implements Responsable
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

        return $this->dataTable->render('admin.users.index', $this->toResponseParameters());
    }

    public function toResponseParameters()
    {
        return [
            'title'      => 'Пользователи',
            'page_title' => 'Список всех пользователей',
        ];
    }

}