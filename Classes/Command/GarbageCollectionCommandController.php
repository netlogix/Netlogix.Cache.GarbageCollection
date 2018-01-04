<?php
namespace Netlogix\Cache\GarbageCollection\Command;

/*
 * This file is part of the Netlogix.Cache.GarbageCollection package.
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Cache\CacheManager;
use TYPO3\Flow\Cache\Exception\NoSuchCacheException;
use TYPO3\Flow\Cli\CommandController;

/**
 * @Flow\Scope("singleton")
 */
class GarbageCollectionCommandController extends CommandController
{

    /**
     * @Flow\InjectConfiguration(path="caches")
     * @var array
     */
    protected $defaultCaches = [];

    /**
     * @Flow\Inject
     * @var CacheManager
     */
    protected $cacheManager;

    /**
     * Trigger garbage collection for the given caches
     *
     * @param array $caches
     */
    public function runCommand(array $caches = [])
    {
        if (empty($caches)) {
            $caches = $this->defaultCaches;
        }

        foreach($caches as $cache) {
            try {
                $frontend = $this->cacheManager->getCache($cache);
                $frontend->collectGarbage();
            } catch (NoSuchCacheException $e) {
                $this->outputFormatted('<error>%s</error>', [$e->getMessage()]);
            }
        }
    }

}
