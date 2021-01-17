<?php
namespace App\Repositories;

use App\Models\Location;
use App\Services\CharacterService;

/**
 */
class LocationRepository implements Repository
{
    /**
     * @var Location $location
     */
    protected $location;

    /**
     * @var CharacterRepository $characterRepository
     */
    protected $characterRepository;

    /**
     * @var CharacterService $characterService
     */
    protected $characterService;

    /**
     * @param Location $location
     * @param CharacterService $characterService
     * @param CharacterRepository $characterRepository
     */
    public function __construct(Location $location, CharacterService $characterService, CharacterRepository $characterRepository)
    {
        $this->location = $location;
        $this->characterService = $characterService;
        $this->characterRepository = $characterRepository;
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
     *
     * @return mixed
     */
    public function show($allId)
    {
        $result = $this->location->show($allId);

        $result['residents'] = $this->determineAllCharacterInformationByLocation($result);

        return $result;
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
        $result = $this->location->all($filters);

        $result['results'] = $this->determineAllCharacterInformationByAllLocation($result['results']);

        return $result;
    }

    /**
     * @param $allLocation
     *
     * @return mixed
     */
    private function determineAllCharacterInformationByAllLocation($allLocation)
    {
        foreach ($allLocation as $key => $location) {
            $allLocation[$key]['residents'] = $this->determineAllCharacterInformationByLocation($location);
        }

        return $allLocation;
    }

    /**
     * @param $location
     *
     * @return mixed
     */
    private function determineAllCharacterInformationByLocation($location)
    {
        $allCharacterId = $this->characterService->determineAllCharacterId($location['residents']);

        if (count($allCharacterId) == 0) {
            return [];
        } elseif (count($allCharacterId) > 1) {
            return $this->characterRepository->show(
                implode(',', $allCharacterId),
            );
        } else {
            return [$this->characterRepository->show(
                implode(',', $allCharacterId),
            )];
        }
    }
}
