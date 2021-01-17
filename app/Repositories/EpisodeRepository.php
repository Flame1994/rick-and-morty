<?php
namespace App\Repositories;

use App\Models\Episode;
use App\Services\CharacterService;

/**
 */
class EpisodeRepository implements Repository
{
    /**
     * @var Episode $episode
     */
    protected $episode;

    /**
     * @var CharacterRepository $characterRepository
     */
    protected $characterRepository;

    /**
     * @var CharacterService $characterService
     */
    protected $characterService;

    /**
     * @param Episode $episode
     * @param CharacterService $characterService
     * @param CharacterRepository $characterRepository
     */
    public function __construct(Episode $episode, CharacterService $characterService, CharacterRepository $characterRepository)
    {
        $this->episode = $episode;
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
        $result = $this->episode->show($allId);

        $result['characters'] = $this->determineAllCharacterInformationByEpisode($result);

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
        $result = $this->episode->all($filters);

        $result['results'] = $this->determineAllCharacterInformationByAllEpisode($result['results']);

        return $result;
    }

    /**
     * @param $allEpisode
     *
     * @return mixed
     */
    private function determineAllCharacterInformationByAllEpisode($allEpisode)
    {
        foreach ($allEpisode as $key => $episode) {
            $allEpisode[$key]['characters'] = $this->determineAllCharacterInformationByEpisode($episode);
        }

        return $allEpisode;
    }

    /**
     * @param $episode
     *
     * @return mixed
     */
    private function determineAllCharacterInformationByEpisode($episode)
    {
        $allCharacterId = $this->characterService->determineAllCharacterId($episode['characters']);

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
