<?php

namespace App\Http\Controllers;

use App\Services\CopomexService;
use App\Services\StatesService;

class StateController extends Controller
{
    public function index()
    {
        $statesApi = CopomexService::getStates();

        if(!is_null($statesApi)) {
            StatesService::storeStates($statesApi);
        }
        
        return view('home/index');
    }
}
