<?php

namespace App\Http\Controllers;

use App\Responses\StandardResponse;
use App\Services\CharacterService;
use Illuminate\Http\Request;

/**
 */
class CharacterController extends Controller
{
    /**
     * @var CharacterService
     */
    protected $characterService;

    /**
     * @param CharacterService $characterService
     */
    public function __construct(CharacterService $characterService)
    {
        $this->characterService = $characterService;
    }

    /**
     * @param $id
     *
     * @return StandardResponse
     */
    public function show($id): StandardResponse
    {
        return $this->characterService->show($id);
    }

    /**
     * @param Request $request
     *
     * @return StandardResponse
     */
    public function all(Request $request): StandardResponse
    {
        return $this->characterService->all($request->input());
    }
}
