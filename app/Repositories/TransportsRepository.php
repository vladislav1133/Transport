<?php

namespace App\Repositories;
use App\Transport;
use App\Vehicle;

class TransportsRepository {

    public function getAll() {

        $transports = Transport::with(["vehicles"])->get();


        return $transports;
    }

    public function getById($id) {

        $transport = Transport::with(["vehicles"])->where("id", $id)->first();

        return $transport;
    }
}