<?php

namespace Vgplay\GameIntegration\Actions;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Vgplay\GameIntegration\Contracts\GetCharacterListInterface;
use Vgplay\GameIntegration\Exceptions\GameNotFoundException;
use Vgplay\GameIntegration\Exceptions\MissingCharacterConfiguration;

class GetCharacterList implements GetCharacterListInterface
{
    /**
     * get character list of a player
     *
     * @param string|int $gameId
     * @param string|int $serverId
     * @param string|int $vgpId
     * @return Collection
     * @throws GameNotFoundException|MissingCharacterConfiguration
     */
    public function get($gameId, $serverId, $vgpId): Collection
    {
        $games = collect(config('games', []));

        $key = sprintf("_%s", $gameId);

        if (!$games->has($key)) {
            throw new GameNotFoundException();
        }

        $game = $games[$key];

        if (empty($game['character_list_api']['url']) || empty($game['character_list_api']['method'])) {
            throw new MissingCharacterConfiguration();
        }

        $data = $this->fetchCharacterList($game, $serverId, $vgpId);

        $characters = collect(isset($data['roles']) ? $data['roles'] : []);

        return $characters->map(function ($character) {
            return [
                'id' => $character['id'],
                'name' => urldecode($character['name']),
                'lv' => $character['lv']
            ];
        })->sortBy('name');
    }

    protected function fetchCharacterList($game, $serverId, $vgpId)
    {
        if ($game['character_list_api']['method'] == 'GET') {
            $res = Http::get($game['character_list_api']['url'], array_merge([
                $game['character_list_api']['params']['vgp_id']    => $vgpId,
                $game['character_list_api']['params']['server_id'] => $serverId,
            ], $game['character_list_api']['pre_params'] ?? []));

            return json_decode($res->body(), true);
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $game['character_list_api']['url'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => $game['character_list_api']['method'],
            CURLOPT_POSTFIELDS => [
                $game['character_list_api']['params']['vgp_id']    => $vgpId,
                $game['character_list_api']['params']['server_id'] => $serverId,
            ],
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response, true);
    }
}
