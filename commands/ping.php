<?php

use App\Command\Create;

Create::new('ping', function () {
    return 'pong';
})->setDescription('Ping the bot')->setUsage('ping');
