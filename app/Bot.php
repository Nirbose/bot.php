<?php

namespace App;

use Discord\Discord;
use Discord\Parts\Channel\Message;
use Discord\Parts\User\Activity;

class Bot {

    protected $discord;
    protected string $token;

    public bool $help = true;

    /**
     * presence of the bot
     *
     * @var array|null
     */
    public $presence;

    public function __construct(array $options = [])
    {
        $this->discord = new Discord($options);
        $this->token = $options['token'];
    }

    public function config(array $options = []) 
    {
        if (isset($options['help']) && is_bool($options['help'])) {
            $this->help = $options['help'];
        }

        if (isset($options['presence'])) {
            $this->presence = $options['presence'];
        }
    }

    public function run()
    {
        $h = new Handler();
        $h->plugin();
        try {

            $this->discord->once('ready', function (Discord $client) {
                echo "Bot is ready!", PHP_EOL;

                if ($this->presence) {
                    $client->updatePresence(new Activity($client, $this->presence, true), false, $this->presence['status']);
                }

                $client->on('message', function (Message $message) {
                    var_dump($message);
                    if ($message->content == PREFIX.'ping') {
                        $message->reply('pong!');
                    }
                });
            });

            $this->discord->run();
    
        } catch (\Discord\Exceptions\IntentException $e) {
            echo $e->getMessage(), PHP_EOL;
        }
    }

}