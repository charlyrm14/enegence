<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CopomexService {

    /**
     * Get a states list from COPOMEX API
     *
     * @return array|null The states list
     */
    public static function getStates(): ?array
    {
        try {

            $token = '378308db-6428-4598-8091-07c9705a0021';
            $url = 'https://api.copomex.com/query/get_estados?token=' . $token;

            $response = Http::timeout(5)->get($url);
            
            if($response->failed() || !$response->successful()) {
                return null;
            }

            $data = $response->json();

            if(is_array($data) && isset($data['response']['estado']) && is_array($data['response']['estado'])) {
                return $data['response']['estado'];
            }

            return null;

        } catch (\Throwable $e) {
            Log::error("Error to get states from copomex: " . $e->getMessage());
            return null;
        }
    }

    public static function getTownsByState(string $stateName): ?array
    {
        try {

            $token = '378308db-6428-4598-8091-07c9705a0021';
            $url = "https://api.copomex.com/query/get_municipio_por_estado/{$stateName}?token=" . $token;

            $response = Http::timeout(5)->get($url);
            
            if($response->failed() || !$response->successful()) {
                return null;
            }

            $data = $response->json();

            if(is_array($data) && isset($data['response']['municipios']) && is_array($data['response']['municipios'])) {
                return $data['response']['municipios'];
            }

            return null;

        } catch (\Throwable $e) {
            Log::error("Error to get towns by state from copomex: " . $e->getMessage());
            return null;
        }
    }
}
