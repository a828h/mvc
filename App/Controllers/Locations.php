<?php

namespace App\Controllers;

use \Core\Response;
use \App\Models\Location;
use \App\Models\Device;

class Locations extends \Core\Controller
{
    public function indexAction()
    {
        $locations = Location::getAll();
        return Response::json($locations);
    }

    public function store() {
        $device = Device::get($this->params['device_id']);
        if($device) {
            $result = Location::insert($this->params['device_id'],$this->params['x'],$this->params['y']);
            if($result) {
                Response::json([
                    'id' => $result , 
                    'device_id' => $this->params['device_id'],
                    'x' => $this->params['x'],
                    'y' => $this->params['y'],
                    ]);
            } else {
                throw new \Exception('can not create location');
            }
        } else {
            throw new \Exception('can not found device',404);
        }
    }
}
