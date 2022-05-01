<?php

namespace App;

use App\Slash;
use Discord\Discord;
use Nirbose\Collection\Collection;

class Handler {

    private static Discord $discord;

    public static function load(Discord $discord)
    {
        self::$discord = $discord;
        return new static();
    }

    public function commands() {
        foreach (glob(__DIR__ . '/../commands/*/*.php') as $file) {
            require_once $file;
        }

        $commands = Collection::get('commands');

        if (is_null($commands)) {
            return;
        }

        foreach ($commands as $command) {
            if (isset($command['slash']) && $command['slash']) {
                Slash::make($command);
            }
        }
    }

    public function listeners() {
        foreach (glob(__DIR__ . '/../listeners/*.php') as $file) {
            require_once $file;
        }

        $listeners = Collection::get('listeners');

        foreach ($listeners as $name => $listener) {
            $this::$discord->on($name, $listener['run']);
        }
    }

}
