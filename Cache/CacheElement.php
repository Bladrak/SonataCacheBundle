<?php
/*
 * This file is part of the Sonata package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\CacheBundle\Cache;

final class CacheElement
{
    protected $ttl;

    protected $keys = array();

    protected $value;

    protected $createdAt;

    protected $contextualKeys = array();

    public function __construct(array $keys, $ttl = 84600)
    {
        $this->createdAt = new \DateTime;
        $this->keys      = $keys;
        $this->ttl       = $ttl;
    }

    public function getKeys()
    {
        return $this->keys;
    }

    public function addKey($name, $value)
    {
        $this->keys[$name] = $value;
    }

    public function getTtl()
    {
        return $this->ttl;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        return $this->value = $value;
    }

    public function isExpired()
    {
        return strtotime('now') > ($this->createdAt->format('U') + $this->ttl);
    }

    public function addContextualKey($name, $value)
    {
        $this->contextualKeys[$name] = $value;
    }

    public function setContextualKeys(array $contextualKeys)
    {
        $this->contextualKeys = $contextualKeys;
    }

    public function getContextualKeys()
    {
        return $this->contextualKeys;
    }
}