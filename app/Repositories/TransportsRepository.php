<?php

namespace App\Repositories;
use App\Transport;
use App\Vehicle;

class TransportsRepository {

    public function getAll() {

        $transports = Transport::with(["vehicles", "type"])->get()->toArray();

        foreach ($transports as &$transport) {


            $transport['type'] = $transport['type']['type'];
        }

        return $transports;
    }

    public function getById($id) {

        $transport = Transport::with(["vehicles", "type"])->where("id", $id)->first()->toArray();

        $transport['type'] = $transport['type']['type'];

        return $transport;
    }
}