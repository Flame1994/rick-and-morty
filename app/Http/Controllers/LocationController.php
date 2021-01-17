<?php

namespace App\Http\Controllers;

use App\Responses\StandardResponse;
use App\Services\LocationService;
use Illuminate\Http\Request;

/**
 */
class LocationController extends Controller
{
    /**
     * @var LocationService
     */
    protected $locationService;

    /**
     * @param LocationService $locationService
     */
    public function __construct(LocationService $locationService)
    {
        $this->locationService = $locationService;
    }

    /**
     * @param $id
     *
     * @return StandardResponse
     */
    public function show($id): StandardResponse
    {
        return $this->locationService->show($id);
    }

    /**
     * @param Request $request
     *
     * @return StandardResponse
     */
    public function all(Request $request): StandardResponse
    {
        return $this->locationService->all($request->input());
    }
}
