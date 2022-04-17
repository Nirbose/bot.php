<?php

namespace App\Command;

class OptionChoice {

    private static $builder = [];

    public static function new(string $name, string $description): self
    {
        self::$builder['name'] = $name;
        self::$builder['description'] = $description;

        return new static();
    }

    public function toArray(): array
    {
        return self::$builder;
    }

}
