<?php

namespace FDevs\GeoBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('f_devs_geo');
        $supportedDrivers = ['mongodb'];

        $rootNode
            ->children()
                ->arrayNode('default_coordinates')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->floatNode('lat')->defaultValue(44.946798)->end()
                        ->floatNode('lng')->defaultValue(34.1092134)->end()
                    ->end()
                ->end()
                ->scalarNode('manager_name')->defaultNull()->end()
                ->scalarNode('db_driver')->defaultValue('mongodb')
                    ->validate()
                        ->ifNotInArray($supportedDrivers)
                        ->thenInvalid('The driver %s is not supported. Please choose one of '.json_encode($supportedDrivers))
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
