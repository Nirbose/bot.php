<?php

namespace App;

class Handler {

    public bool $help;

    public function __construct(bool $help = true)
    {
        $this->help = $help;
    }

    public function plugin()
    {
        echo "ok ?\n";
        foreach (glob(dirname(__DIR__) . '/plugins/*/config.json') as $plugin) {
            var_dump($plugin);
        }
    }

}