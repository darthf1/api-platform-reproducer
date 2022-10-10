<?php

declare(strict_types=1);

namespace App\ApiPlatform\DataProvider;

use ApiPlatform\Core\Bridge\Elasticsearch\DataProvider\CollectionDataProvider;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use ApiPlatform\Core\DataProvider\SubresourceDataProviderInterface;

final class MyCollectionDataProvider implements SubresourceDataProviderInterface, RestrictedDataProviderInterface
{
    public function __construct(
        private readonly CollectionDataProvider $collectionDataProvider,
    ) {
    }

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return true;
    }

    public function getSubresource(string $resourceClass, array $identifiers, array $context, string $operationName = null): iterable
    {
        return $this->collectionDataProvider->getCollection($resourceClass, $operationName, $context);
    }
}
