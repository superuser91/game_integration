<?php

namespace Vgplay\GameIntegration\Contracts;

use Illuminate\Support\Collection;

interface GetServerListInterface
{
    public function get($gameId): Collection;
}
