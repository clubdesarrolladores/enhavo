<?php

namespace Enhavo\Bundle\TranslationBundle\DependencyInjection;

use Sylius\Bundle\ResourceBundle\DependencyInjection\Extension\AbstractResourceExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class EnhavoTranslationExtension extends AbstractResourceExtension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('enhavo_translation.translate', $config[ 'translate' ]);
        $container->setParameter('enhavo_translation.default_locale', $config[ 'default_locale' ]);
        $container->setParameter('enhavo_translation.locales', $config[ 'locales' ]);
        $container->setParameter('enhavo_translation.translation_strings', $config[ 'translation_strings' ]);

        $this->registerResources('enhavo_translation', $config['driver'], $config['resources'], $container);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
}