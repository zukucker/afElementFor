<?php

namespace afElement\Tests;

use afElement\afElement as Plugin;
use Shopware\Components\Test\Plugin\TestCase;

class PluginTest extends TestCase
{
    protected static $ensureLoadedPlugins = [
        'afElement' => []
    ];

    public function testCanCreateInstance()
    {
        /** @var Plugin $plugin */
        $plugin = Shopware()->Container()->get('kernel')->getPlugins()['afElement'];

        $this->assertInstanceOf(Plugin::class, $plugin);
    }
}
