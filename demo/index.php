<?php

use App\Bot;
use Discord\WebSockets\Intents;
use Dotenv\Dotenv;

define('BASE_PATH', __DIR__ . '/..');

include BASE_PATH . "/vendor/autoload.php";

Dotenv::createImmutable(BASE_PATH)->load();

define("PREFIX", $_ENV["BOT_PREFIX"]);

Bot::new([
    'token' => $_ENV['BOT_TOKEN'],
    'intents' => Intents::getAllIntents()
])->run();
