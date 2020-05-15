<?php

namespace afElement;

use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context\InstallContext;
use Shopware\Components\Emotion\ComponentInstaller;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Shopware-Plugin afElement.
 */
class afElement extends Plugin
{

    /**
    * @param ContainerBuilder $container
    */
    public function build(ContainerBuilder $container)
    {
        $container->setParameter('af_element.plugin_dir', $this->getPath());
        parent::build($container);
	}
	private $pluginName;

	public function install(InstallContext $install)
	{
		$installer = $this->container->get('shopware.emotion_component_installer');

		$videoElement = $installer->createOrUpdate(
			$this->getName(),
			'Test Plugin',
			[
				'name' => 'Youtube Alexander Video',
				'template' => 'emotion_yt',
				'cls' => 'emotion-yt-element',
				'description' => 'just a simple video element'
			]
		);
		
		$videoElement->createTextField(
			[
				'name' => 'yt_video_name',
				'fieldLabel' => 'Youtube Video Name',
				'supportText' => 'Hier Youtube Video Namen eingeben',
			]
		);

		$videoElement->createCheckboxField(
			[
				'name' => 'yt_video_checked',
				'fieldLabel' => 'Hintergrund grün?'
			]
		);

	}

}
