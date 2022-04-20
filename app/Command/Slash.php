<?php

namespace App\Command;

use Discord\DiscordCommandClient as Cmd;

class Slash {

    private static array $fields = ['name', 'description', 'type', 'options'];

    public static function make(array $command) {
        $attributes = [];
        $guilds = [];

        foreach ($command as $key => $value) {
            if (in_array($key, self::$fields)) {
                $attributes[$key] = $value;
            }

            if ($key === 'guilds') {
                $guilds = $value;
            }
        }

        Slash::register($attributes, $guilds);
    }

    /**
     * Register the command.
     * 
     * @param array $attributes
     * @return void
     */
    public static function register(array $attributes, ?array $guilds = []) {
        $cmd = new Cmd($attributes);

        if (!count($guilds)) {

        }
    }

}
