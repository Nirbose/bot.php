<?php

namespace App;

use Discord\Discord;

class Bot {

    protected $discord;

    private static array $options = [];

    /**
     * Create a new Bot instance. 
     *
     * @param array $options
     * @return self
     */
    public static function new(array $options): self
    {
        self::$options = $options;

        return new static();
    }

    /**
     * Run the bot.
     * 
     * @return void
     */
    public function run()
    {
        $this->discord = new Discord($this::$options);
        $this->discord->run();
    }

}