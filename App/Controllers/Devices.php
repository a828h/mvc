<?php

namespace App\Controllers;

use \Core\Response;
use \App\Models\Device;

class Devices extends \Core\Controller
{
    public function indexAction()
    {
        $locations = Device::getAll();
        return Response::json($locations);
    }

    public function storeAction() {
        $result = Device::insert($this->params['name']);
        if($result) {
            Response::json(['id' => $result , 'name' => $this->params['name']]);
        } else {
            throw new \Exception('can not create device');
        }
    }
}
