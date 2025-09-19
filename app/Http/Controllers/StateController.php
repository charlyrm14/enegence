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

    /**
     * Display a view with the towns by state name
     *
     *  @param string $stateName The name of the state
     *  @return array Towns data from the Copomex API
     *  @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException Throws 404 if no towns are found.
     */
    public function townsByState(string $stateName)
    {
        $towns = CopomexService::getTownsByState($stateName);
    
        if(!$towns) {
            abort(404);
        }

        return view('towns/index', [
            'state' => $stateName,
            'towns' => $towns
        ]);
    }
}
