<?php

namespace App;

class Command extends Bot {

    public array $commands = [];
    private string $name;

    public static function new()
    {
        return new static();
    }

    public function create(string $name, string $description, callable $fn, array $options = []) 
    {
        $this->name = strtolower($name);

        if ($this->name == "help" && $this->help) {
            return;
        }

        $this->commands[$this->name] = [
            'description' => $description,
            'fn' => $fn
        ];
    }

    public function setPermission(array $permissions)
    {
        $this->commands[$this->name]['permissions'] = $permissions;
    }

}