<?php
namespace App\Services;

use App\Repositories\LocationRepository;
use App\Responses\StandardResponse;

/**
 */
class LocationService extends Service
{
    /**
     * @var LocationRepository
     */
    protected $locationRepository;

    /**
     * @param LocationRepository $locationRepository
     */
    public function __construct(LocationRepository $locationRepository)
    {
        $this->locationRepository = $locationRepository;
    }

    /**
     * @param $id
     *
     * @return StandardResponse
     */
    public function show($id): StandardResponse
    {
        return $this->success($this->locationRepository->show($id));
    }

    /**
     * @param array $data
     *
     * @return StandardResponse
     */
    public function all(array $data): StandardResponse
    {
        return $this->success($this->locationRepository->all($data));
    }
}
