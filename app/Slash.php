<?php

namespace App;

use Discord\Discord;
use Discord\Parts\Interactions\Command\Command;
use Error;

class Slash {

    /**
     * Discord instance
     *
     * @var Discord|null
     */
    private static $discord = null;

    private static array $fields = ['name', 'description', 'type', 'options'];

    /**
     * Init Discord instance
     *
     * @param Discord $discord
     * @return void
     */
    public static function init(Discord $discord) {
        self::$discord = $discord;
    }

    /**
     * Make slash command
     *
     * @param array $command
     * @return void
     */
    public static function make(array $command) {
        self::checker();

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

        self::register($attributes, $guilds);
    }

    /**
     * Register the command.
     * 
     * @param array $attributes
     * @return void
     */
    private static function register(array $attributes, ?array $guilds = []) {
        $cmd = new Command(self::$discord, $attributes);

        if (!count($guilds)) {
            self::$discord->application->commands->save($cmd);
        } else {
            foreach ($guilds as $guild) {
                $guild = self::$discord->guilds->get('id', $guild);

                if ($guild) {
                    $guild->commands->save($cmd);
                }
            }    
        }
    }

    /**
     * Check if Discord instance is set.
     *
     * @return void
     */
    private static function checker()
    {
        if (self::$discord instanceof Discord) {
            return true;
        }

        return new Error('Discord instance not found.');
    }

}
