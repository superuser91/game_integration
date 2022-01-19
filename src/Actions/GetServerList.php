<?php

namespace Vgplay\GameIntegration\Actions;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Vgplay\GameIntegration\Contracts\GetServerListInterface;
use Vgplay\GameIntegration\Exceptions\GameNotFoundException;
use Vgplay\GameIntegration\Exceptions\MissingServerConfiguration;

class GetServerList implements GetServerListInterface
{
    /**
     * get server list of the game
     *
     * @param string|int $gameId
     * @return Collection
     * @throws GameNotFoundException|MissingServerConfiguration
     */
    public function get($gameId): Collection
    {
        $games = collect(config('games', []));

        $key = sprintf("_%s", $gameId);

        if (!$games->has($key)) {
            throw new GameNotFoundException();
        }

        $game = $games[$key];

        if (empty($game['server_list_api_url'])) {
            throw new MissingServerConfiguration();
        }

        return Cache::remember(sprintf("_%s_servers", $gameId), 30 * 60, function () use ($game) {
            $data = json_decode(file_get_contents($game['server_list_api_url']), true);

            $servers = collect(isset($data['servers_list']) ? $data['servers_list'] : []);

            return $servers->map(function ($server) {
                return [
                    'id' => $server['id'],
                    'name' => urldecode($server['name']),
                    'status' => $server['status']
                ];
            })->sortBy('name');
        });
    }
}
