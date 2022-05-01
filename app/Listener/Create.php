<?php

namespace App\Listener;

use Nirbose\Collection\Collection;

class Create {

    /**
     * Create a new listener
     * 
     * @param string $name
     * @param callback $fn
     * @return void
     */
    public static function new(string $name, $fn)
    {
        Collection::add('listeners', [$name => [
            'run' => $fn,
        ]]);
    }

}
