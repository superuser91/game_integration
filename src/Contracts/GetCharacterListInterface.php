<?php

namespace Vgplay\GameIntegration\Contracts;

use Illuminate\Support\Collection;

interface GetCharacterListInterface
{
    public function get($gameId, $serverId, $vgpId): Collection;
}
