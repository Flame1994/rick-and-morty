<?php
namespace App\Services;

use App\Traits\API;

/**
 */
class RatingsAPI
{
    use API;

    /**
     * Url constants.
     */
    protected const BASE_URL = 'https://www.omdbapi.com/';

    /**
     * @return string
     */
    protected function baseUrl(): string
    {
        return self::BASE_URL;
    }

    /**
     * @return array
     */
    private function apiFilterConstants()
    {
        return [
            'i' => 'tt2861424',
            'apikey' => env('OMDBAPI_API_KEY'),
        ];
    }

    /**
     * @param array $filters
     *
     * @return mixed
     */
    public function getAll(array $filters)
    {
        $filters = array_merge($filters, $this->apiFilterConstants());

        return $this->request('GET', $this->baseUrl() . $this->filterUrl($filters));
    }
}
