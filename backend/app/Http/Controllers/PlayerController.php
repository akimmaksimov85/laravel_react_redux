<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlayerCollection;
use App\Http\Resources\PlayerResource;
use App\Player;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ResourceCollection
     */
    public function index(): ResourceCollection
    {
        return new PlayerCollection(Player::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): string
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $player = Player::create($request->all());

        return (new PlayerResource($player))
            ->response()
            ->setStatusCode(200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return PlayerResource
     */
    public function show(int $id): PlayerResource
    {
        return new PlayerResource(Player::findOrFail($id));
    }

    /**
     * @param Request $request
     * @param int $id
     * @return PlayerResource
     */
    public function answer(Request $request, int $id): PlayerResource
    {
        $request->merge([
            'correct' => (bool) json_decode($request->get('correct'))
        ]);
        $request->validate([
            'correct' => 'required|boolean',
        ]);

        $player = Player::findOrFail($id);
        $player->answers++;
        $player->points = ($request->get('correct')
            ? $player->points + 1
            : $player->points - 1);
        $player->save();

        return new PlayerResource($player);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete(int $id): string
    {
        $player = Player::findOrFail($id);
        $player->delete();

        return response()->json(null, 204);
    }

    /**
     * @param $id
     * @return JsonResource
     */
    public function resetAnswers(int $id): JsonResource
    {
        $player = Player::findOrFail($id);
        $player->answers = 0;
        $player->points = 0;

        return new PlayerResource($player);
    }
}
