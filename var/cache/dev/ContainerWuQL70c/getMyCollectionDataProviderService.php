<?php

namespace ContainerWuQL70c;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getMyCollectionDataProviderService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\ApiPlatform\DataProvider\MyCollectionDataProvider' shared autowired service.
     *
     * @return \App\ApiPlatform\DataProvider\MyCollectionDataProvider
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/ApiPlatform/DataProvider/MyCollectionDataProvider.php';

        return $container->privates['App\\ApiPlatform\\DataProvider\\MyCollectionDataProvider'] = new \App\ApiPlatform\DataProvider\MyCollectionDataProvider(($container->privates['api_platform.elasticsearch.collection_data_provider'] ?? $container->load('getApiPlatform_Elasticsearch_CollectionDataProviderService')));
    }
}
