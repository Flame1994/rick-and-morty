<?php
namespace App\Models;

/**
 */
class Character extends Model
{
    /**
     * Resource constants.
     */
    protected const RESOURCE = 'character';

    /**
     * @return string
     */
    public function resource(): string
    {
        return self::RESOURCE;
    }

    /**
     * @param $allId
     *
     * @return mixed
     */
    public function show($allId)
    {
        return $this->rickAndMortyAPI->get($this->resource(), $allId);
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
