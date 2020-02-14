<?php

namespace ConstantExposureBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $rootName = 'constant_exposure';

        $treeBuilder = new TreeBuilder($rootName);
        $rootNode = method_exists($treeBuilder, 'getRootNode') ? $treeBuilder->getRootNode() : $treeBuilder->root($rootName);

        $rootNode
            ->children()
                ->arrayNode('parameter')
                    ->scalarPrototype()
                    ->end()
            ->end()
                ->arrayNode('class')
                    ->beforeNormalization()
                    ->always()
                    ->then(function ($v) {
                        $normalized = [];
                        foreach ((array)$v as $className => $classData) {
                            $normalized[] = array_merge($classData, ['name' => $className]);
                        }

                        return $normalized;
                    })
                    ->end()
                    ->arrayPrototype()
                        ->children()
                            ->scalarNode('name')
                                ->isRequired()
                                ->end()
                            ->scalarNode('alias')
                                ->isRequired()
                                ->end()
                            ->arrayNode('constants')
                                ->isRequired()
                                ->scalarPrototype()
                                ->end();

        return $treeBuilder;
    }
}