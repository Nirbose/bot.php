<?php

namespace App\Command;

use Nirbose\Collection\Collection;

class Create {

    /**
     * @var string $name
     */
    protected static $name;

    /**
     * @var bool $isSlash
     */
    protected static $isSlash;
    
    /**
     * Create a new command instance.
     * 
     * @param string $name
     * @param callback $fn
     * @param bool $slash
     * @return self
     */
    public static function new(string $name, $fn, ?bool $slash = false): self
    {
        self::$name = $name;
        self::$isSlash = $slash;

        Collection::add($name, ['run' => $fn, 'slash' => $slash]);
        return new static();
    }

    /**
     * set description for command
     * 
     * @param string $description
     * @return self
     */
    public function setDescription(string $description): self
    {
        Collection::add(self::$name, ['description' => $description]);
        return new static();
    }

    /**
     * set usage for command
     * 
     * @param string $usage
     * @return self
     */
    public function setUsage(string $usage): self
    {
        Collection::add(self::$name, ['usage' => $usage]);
        return new static();
    }

    /**
     * set alias for command (only message command)
     * 
     * @param string[] $alias
     * @return self
     */
    public function setAlias(array $alias): self
    {
        Collection::add(self::$name, ['alias' => $alias]);
        return new static();
    }

    /**
     * set permission for command
     * 
     * @param string $permission
     * @return self
     */
    public function setPermission(string $permission): self
    {
        Collection::add(self::$name, ['permission' => $permission]);
        return new static();
    }

    /**
     * set options for command
     * 
     * @param Option[] $options
     * @return self
     */
    public function setOptions(Option ...$options): self
    {
        if (is_array($options)) {
            Collection::add(self::$name, ['options' => $options]);
        } else {
            foreach ($options as $option) {
                Collection::add(self::$name, ['options' => $option->toArray()]);
            }
        }
        
        return new static();
    }

    /**
     * set guilds for command
     * 
     * @param string[] $guilds
     * @return self
     */
    public function setGuilds(array $guilds): self
    {
        Collection::add(self::$name, ['guilds' => $guilds]);
        return new static();
    }

    /**
     * link linstener for command
     * 
     * @param string $listener
     * @return self
     */
    public function linkListener(string $listener): self
    {
        Collection::add(self::$name, ['listener' => $listener]);
        return new static();
    }

}
