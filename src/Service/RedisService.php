<?php

namespace App\Service;

use Predis\Client;

class RedisService
{
    /**
     * @var Client
     */
    private $cache;

    public function __construct(Client $cache)
    {
        $this->cache = $cache;
    }

    public function getKeys()
    {
        return $this->cache->keys('*');
    }

    public function getValue($key)
    {
        $asd = serialize($this->cache->get($key));
        dump($asd);
        dump(unserialize($asd));
        die();

        return unserialize($this->cache->get($key));
    }
}