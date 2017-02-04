<?php

namespace Bolt\Provider;

use Bolt\Cache;
use Silex\Application;
use Pimple\ServiceProviderInterface;

class CacheServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['cache'] = 
            function (Application $app) {
                try {
                    $cache = new Cache(
                        $app['path_resolver']->resolve('%cache%/' . $app['environment'] . '/data'),
                        Cache::EXTENSION,
                        0002,
                        $app['filesystem']
                    );
                } catch (\Exception $e) {
                    $app['logger.system']->critical($e->getMessage(), ['event' => 'exception', 'exception' => $e]);
                    throw $e;
                }

                return $cache;
            }
        ;
    }

    public function boot(Application $app)
    {
    }
}
