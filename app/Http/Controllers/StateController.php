<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Services\CopomexService;
use App\Services\StatesService;

class StateController extends Controller
{
    public function index()
    {
        $data = [];

        $statesDB = State::get();

        if(!$statesDB->isEmpty()) {

            $data = $statesDB;

        } else {

            $statesApi = CopomexService::getStates();

            if(!is_null($statesApi)) {

                StatesService::storeStates($statesApi);
                $data = State::get();
            }
        }

        
        return view('home/index', [
            'states' => $data
        ]);
    }
}
