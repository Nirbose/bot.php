<?php

namespace App;

class BotOptions {

    protected static $config;

    /**
     * Set prefix for commands.
     *
     * @param string $prefix
     * @return self
     */
    public function setPrefix(string $prefix): self
    {
        self::$config['prefix'] = $prefix;
        return $this;
    }

    /**
     * Set the intents to use.
     *
     * @param array ...$intents
     * @return self
     */
    public function setIntents(array $intents): self
    {
        self::$config['intents'] = $intents;
        return $this;
    }

    /**
     * Set the logger.
     * 
     * @param \Monolog\Logger $logger
     * @return self
     */
    public function setLogger(\Monolog\Logger $logger): self
    {
        self::$config['logger'] = $logger;
        return $this;
    }

    /**
     * Set the load all members option.
     * 
     * @param bool $loadAllMembers
     * @return self
     */
    public function setLoadAllMembers(bool $loadAllMembers): self
    {
        self::$config['loadAllMembers'] = $loadAllMembers;
        return $this;
    }

    /**
     * Set the store messages option.
     * 
     * @param bool $storeMessages
     * @return self
     */
    public function setStoreMessages(bool $storeMessages): self
    {
        self::$config['storeMessages'] = $storeMessages;
        return $this;
    }

    /**
     * Set the retrieve bans option.
     * 
     * @param bool $retrieveBans
     * @return self
     */
    public function setRetrieveBans(bool $retrieveBans): self
    {
        self::$config['retrieveBans'] = $retrieveBans;
        return $this;
    }

    /**
     * Set the pm channels option.
     * 
     * @param bool $pmChannels
     * @return self
     */
    public function setPmChannels(bool $pmChannels): self
    {
        self::$config['pmChannels'] = $pmChannels;
        return $this;
    }

    /**
     * Set the disabled events option.
     * 
     * @param array $disabledEvents
     * @return self
     */
    public function setDisabledEvents(array $disabledEvents): self
    {
        self::$config['disabledEvents'] = $disabledEvents;
        return $this;
    }

    /**
     * Set the loop option.
     * 
     * @param \React\EventLoop\Factory $loop
     * @return self
     */
    public function setLoop(\React\EventLoop\Factory $loop): self
    {
        self::$config['loop'] = $loop;
        return $this;
    }

    /**
     * Set the dns config.
     * 
     * @param string $dnsConfig
     * @return self
     */
    public function setDnsConfig(string $dnsConfig): self
    {
        self::$config['dnsConfig'] = $dnsConfig;
        return $this;
    }

}
