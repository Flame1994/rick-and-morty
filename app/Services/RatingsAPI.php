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
     * Filter constants.
     */
    protected const API_FILTER_SERIES_CODE_KEY = 'i';
    protected const API_FILTER_SERIES_CODE = 'tt2861424';
    protected const API_FILTER_API_KEY = 'apikey';

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
            self::API_FILTER_SERIES_CODE_KEY => self::API_FILTER_SERIES_CODE,
            self::API_FILTER_API_KEY => env('OMDBAPI_API_KEY'),
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
