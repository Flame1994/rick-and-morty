<?php
namespace App\Repositories;

use App\Models\Character;

/**
 */
class CharacterRepository implements Repository
{
    /**
     * @var Character $character
     */
    protected $character;

    /**
     * @param Character $character
     */
    public function __construct(Character $character)
    {
        $this->character = $character;
    }

    /**
     * @param array $data
     */
    public function store(array $data)
    {
        // Not storing any information.
    }

    /**
     * @param $allId
     */
    public function show($allId)
    {
        return $this->character->show($allId);
    }

    /**
     * @param array $data
     * @param $id
     */
    public function update(array $data, $id)
    {
        // Not updating any information.
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        // Not deleting any information.
    }

    /**
     * @param $filters
     *
     * @return mixed
     */
    public function all($filters)
    {
        return $this->character->all($filters);
    }
}
