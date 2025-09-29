<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\State;
use Illuminate\Support\Facades\Log;

class StatesService {

    public static function storeStates(array $states): void
    {
        try {
            
            if(!empty($states)) {
                foreach($states as $state) {
                    State::updateOrCreate([
                        'name' => $state
                    ], [
                        'name' => $state,
                        'visibility' => 1
                    ]);
                }
            }

        } catch (\Throwable $e) {
            Log::error("Error to get states from copomex: " . $e->getMessage());
        }
    }
}
