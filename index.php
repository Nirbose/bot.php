<?php

use App\Handler;
use App\Slash;
use Discord\Discord;

$discord = new Discord($this::$options);

$discord->on('ready', function (Discord $discord) {
    Slash::init($discord);
    $handler = Handler::load($this->discord);

    $handler->listeners();
    $handler->commands();
});

$discord->run();