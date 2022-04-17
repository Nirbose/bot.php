<?php

namespace App\Command;

class Option {

    private static array $builder = [];

    public static function new(string $name, string $description)
    {
        self::$builder['name'] = $name;
        self::$builder['description'] = $description;

        return new static();
    }

    /**
     * Set type of option
     * 
     * @param int $type
     * @return self
     */
    public function setType(int $type): self
    {
        self::$builder['type'] = $type;
        return new static();
    }

    /**
     * Set choices for option if type is choice
     * 
     * @param OptionChoice[] $choices
     * @return self
     */
    public function setChoices(OptionChoice ...$choices): self
    {
        if (is_array($choices)) {
            self::$builder['choices'] = $choices;
        } else {
            foreach ($choices as $choice) {
                self::$builder['choices'][] = $choice->toArray();
            }
        }

        return new static();
    }

    /**
     * Set required for option
     * 
     * @param bool $required
     * @return self
     */
    public function setRequired(bool $required): self
    {
        self::$builder['required'] = $required;

        return new static();
    }

    /**
     * Set Min for option if option is number
     * 
     * @param int $min
     * @return self
     */
    public function setMin(int $min): self
    {
        self::$builder['min_value'] = $min;

        return new static();
    }

    /**
     * Set Max for option if option is number
     * 
     * @param int $max
     * @return self
     */
    public function setMax(int $max): self
    {
        self::$builder['max_value'] = $max;

        return new static();
    }

    /**
     * Set autocomplete
     * 
     * @param bool $autocomplete
     * @return self
     */
    public function setAutocomplete(bool $autocomplete): self
    {
        self::$builder['autocomplete'] = $autocomplete;

        return $this;
    }

    /**
     * Set channels types
     * 
     * @param array $types
     * @return self
     */
    public function setChannelsTypes(array $types): self
    {
        self::$builder['channelsTypes'] = $types;

        return $this;
    }

    public function toArray(): array
    {
        return self::$builder;
    }

}
