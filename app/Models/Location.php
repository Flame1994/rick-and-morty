<?php
namespace App\Models;

/**
 */
class Location extends Model
{
    /**
     * Resource constants.
     */
    protected const RESOURCE = 'location';

    /**
     * @return string
     */
    public function resource(): string
    {
        return self::RESOURCE;
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function show($id)
    {
        return $this->rickAndMortyAPI->get($this->resource(), $id);
    }

    /**
     * @param $filters
     *
     * @return mixed
     */
    public function all($filters)
    {
        return $this->rickAndMortyAPI->getAll($this->resource(), $filters);
    }
}
