<?php
namespace App\Services;

use App\Repositories\CharacterRepository;
use App\Responses\StandardResponse;

/**
 */
class CharacterService extends Service
{
    /**
     * @var CharacterRepository
     */
    protected $characterRepository;

    /**
     * @param CharacterRepository $characterRepository
     */
    public function __construct(CharacterRepository $characterRepository)
    {
        $this->characterRepository = $characterRepository;
    }

    /**
     * @param $id
     *
     * @return StandardResponse
     */
    public function show($id): StandardResponse
    {
        return $this->success($this->characterRepository->show($id));
    }

    /**
     * @param array $data
     *
     * @return StandardResponse
     */
    public function all(array $data): StandardResponse
    {
        return $this->success($this->characterRepository->all($data));
    }

    /**
     * @param $characters
     *
     * @return array
     */
    public function determineAllCharacterId($characters)
    {
        $allId = [];

        foreach ($characters as $character) {
            $allId[] = $this->determineCharacterId($character);
        }

        return $allId;
    }

    /**
     * @param $character
     *
     * @return string
     */
    private function determineCharacterId($character): string
    {
        $characterUrl = explode('/', $character);

        return end($characterUrl);
    }
}
