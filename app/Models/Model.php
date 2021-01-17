<?php
namespace App\Models;

use App\Services\RatingsAPI;
use App\Services\RickAndMortyAPI;

/**
 */
abstract class Model
{
    /**
     * @var RickAndMortyAPI $rickAndMortyApi
     */
    protected $rickAndMortyAPI;

    /**
     * @var RatingsAPI $ratingsAPI
     */
    protected $ratingsAPI;

    /**
     * @param RickAndMortyAPI $rickAndMortyAPI
     * @param RatingsAPI $ratingsAPI
     */
    public function __construct(RickAndMortyAPI $rickAndMortyAPI, RatingsAPI $ratingsAPI)
    {
        $this->rickAndMortyAPI = $rickAndMortyAPI;
        $this->ratingsAPI = $ratingsAPI;
    }

    /**
     * @return string
     */
    abstract public function resource(): string;

    /**
     * @param $id
     *
     * @return mixed
     */
    abstract public function show($id);

    /**
     * @param $filters
     *
     * @return mixed
     */
    abstract public function all($filters);
}
