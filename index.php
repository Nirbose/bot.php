<?php

use App\Bot;
use Discord\WebSockets\Intents;
use Dotenv\Dotenv;

include "./vendor/autoload.php";

Dotenv::createImmutable(__DIR__)->load();

define("PREFIX", $_ENV["BOT_PREFIX"]);

$bot = new Bot([
    'token' => $_ENV['BOT_TOKEN'],
    'intents' => Intents::getAllIntents()
]);

$bot->run();
