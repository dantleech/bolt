<?php
namespace Bolt\Tests\Provider;

use Bolt\Provider\PathServiceProvider;
use Bolt\Tests\BoltFunctionalTestCase;

/**
 * Class to test src/Provider/PathServiceProvider.
 *
 * @author Ross Riley <riley.ross@gmail.com>
 */
class PathServiceProviderTest extends BoltFunctionalTestCase
{
    public function testProvider()
    {
        $app = $this->getApp();
        $provider = new PathServiceProvider($app);
        $app->register($provider);
        $this->assertInstanceOf('Eloquent\Pathogen\FileSystem\Factory\PlatformFileSystemPathFactory', $app['pathmanager']);
        $app->boot();
    }
}
