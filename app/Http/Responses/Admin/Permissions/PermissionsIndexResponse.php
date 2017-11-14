<?php

namespace App\Http\Responses\Admin\Permissions;

use Illuminate\Contracts\Support\Responsable;

class PermissionsIndexResponse implements Responsable
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

        return $this->dataTable->render('admin.permissions.index', $this->toResponseParameters());
    }

    public function toResponseParameters()
    {
        return [
            'title'      => 'Список разрешение',
            'page_title' => 'Список всех разрешение',
        ];
    }

}