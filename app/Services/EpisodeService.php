<?php
namespace App\Services;

use App\Repositories\EpisodeRepository;
use App\Responses\StandardResponse;
use App\Traits\Response;

/**
 */
class EpisodeService extends Service
{
    /**
     * @var EpisodeRepository
     */
    protected $episodeRepository;

    /**
     * @param EpisodeRepository $episodeRepository
     */
    public function __construct(EpisodeRepository $episodeRepository)
    {
        $this->episodeRepository = $episodeRepository;
    }

    /**
     * @param $id
     *
     * @return StandardResponse
     */
    public function show($id): StandardResponse
    {
        return $this->success($this->episodeRepository->show($id));
    }

    /**
     * @param array $data
     *
     * @return StandardResponse
     */
    public function all(array $data): StandardResponse
    {
        return $this->success($this->episodeRepository->all($data));
    }
}
