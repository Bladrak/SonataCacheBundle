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

interface CacheInterface
{
    function get(CacheElement $cacheElement);

    function has(CacheElement $cacheElement);

    function set(CacheElement $cacheElement);

    function flush(array $keys = array());

    function flushAll();

    function isContextual();
}