<?php

namespace Vgplay\GameIntegration;

use Illuminate\Support\ServiceProvider;

class VgplayGameIntegrationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/configs/games.php', 'games');
    }
}
