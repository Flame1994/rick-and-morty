<?php
namespace App\Services;

use App\Traits\API;

/**
 */
class RickAndMortyAPI
{
    use API;

    /**
     * Url constants.
     */
    protected const BASE_URL = 'https://rickandmortyapi.com/api/';

    /**
     * @return string
     */
    protected function baseUrl(): string
    {
        return self::BASE_URL;
    }

    /**
     * @param $resource
     * @param $allId
     *
     * @return mixed|null
     */
    public function get($resource, $allId)
    {
        return $this->request('GET',$this->baseUrl() . strtolower($resource) . '/' . $allId);
    }

    /**
     * @param $resource
     * @param array $filters
     *
     * @return mixed|null
     */
    public function getAll($resource, array $filters)
    {
        return $this->request('GET',$this->baseUrl() . strtolower($resource) . $this->filterUrl($filters));
    }
}
