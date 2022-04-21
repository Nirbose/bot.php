<?php

namespace App;

use App\Slash;
use Nirbose\Collection\Collection;

class Handler {

    public static function load()
    {
        return new class() {

            public function commands() {
                $this->each(__DIR__ . '/../commands/*/*.php');

                $commands = Collection::get('commands');

                foreach ($commands as $command) {
                    if (isset($command['slash']) && $command['slash']) {
                        Slash::make($command);
                    }
                }
            }

            public function listeners() {

            }

            private function each(string $path) {
                foreach (glob($path) as $file) {
                    require_once $file;
                }
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