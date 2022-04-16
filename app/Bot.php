<?php

namespace App;

use Discord\Discord;

class Bot extends BotOptions {

    protected $discord;
    private array $options = [
        'token',
        'intents',
        'logger',
        'loadAllMembers',
        'storeMessages',
        'retrieveBans',
        'pmChannels',
        'disabledEvents',
        'loop',
        'logger',
        'dnsConfig',
        'shardId',
        'shardCount',
    ];

    /**
     * Create a new Bot instance. 
     *
     * @param string $token
     * @return self
     */
    public static function new(string $token): self
    {
        self::$config['token'] = $token;
        return new static();
    }

    /**
     * Run the bot.
     * 
     * @return void
     */
    public function run()
    {
        $options = [];

        foreach ($this::$config as $key => $value) {
            if (in_array($key, $this->options)) {
                $options[$key] = $value;
            }
        }

        $this->discord = new Discord($options);
    }


}