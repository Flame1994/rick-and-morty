<?php

namespace App\Http\Controllers;

use App\Responses\StandardResponse;
use App\Services\EpisodeService;
use Illuminate\Http\Request;

/**
 */
class EpisodeController extends Controller
{
    /**
     * @var EpisodeService
     */
    protected $episodeService;

    /**
     * @param EpisodeService $episodeService
     */
    public function __construct(EpisodeService $episodeService)
    {
        $this->episodeService = $episodeService;
    }

    /**
     * @param $id
     *
     * @return StandardResponse
     */
    public function show($id): StandardResponse
    {
        return $this->episodeService->show($id);
    }

    /**
     * @param Request $request
     *
     * @return StandardResponse
     */
    public function all(Request $request): StandardResponse
    {
        return $this->episodeService->all($request->input());
    }
}
