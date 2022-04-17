<?php

namespace App;

use Nirbose\Collection\Collection;

class Handler {

    public static function load()
    {
        return new class() {

            public function commands() {
                $commands = Collection::get('commands');

                foreach ($commands as $command) {
                }
            }

            public function listeners() {

            }

            private function slashBuilder(array $command): array
            {
                $attributes = [
                    'name' => $command['name'],
                    'description' => $command['description'],
                    'type' => $command['type'],
                    'options' => $command['options'],
                ];

                return $attributes;
            }

        };
    }

}