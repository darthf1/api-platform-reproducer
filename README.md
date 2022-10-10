# Api Platform reproducer 2.7 upgrade

Reproducer for issue https://github.com/api-platform/core/issues/5005

## How to reproduce:
- `git clone https://github.com/darthf1/api-platform-reproducer.git`
- `cd api-platform-reproducer`
- `git checkout master`
- `docker compose up -d --build`
- `docker compose exec php composer install`
- `docker compose exec php bin/phpunit`

### Output
```
There was 1 error:

1) App\Tests\Test::testGetMyEntities
Error: Class "ApiPlatform\Core\Bridge\Elasticsearch\DataProvider\Extension\ConstantScoreFilterExtension" not found

/home/www/app/var/cache/dev/ContainerWuQL70c/getApiPlatform_Elasticsearch_RequestBodySearchExtension_ConstantScoreFilterService.php:20
/home/www/app/var/cache/dev/ContainerWuQL70c/App_KernelDevDebugContainer.php:483
/home/www/app/var/cache/dev/ContainerWuQL70c/getApiPlatform_Elasticsearch_CollectionDataProviderService.php:23
/home/www/app/vendor/api-platform/core/src/Core/Bridge/Elasticsearch/DataProvider/CollectionDataProvider.php:120
/home/www/app/src/ApiPlatform/DataProvider/MyCollectionDataProvider.php:25
/home/www/app/vendor/api-platform/core/src/Core/Bridge/Symfony/Bundle/DataProvider/TraceableChainSubresourceDataProvider.php:63
/home/www/app/vendor/api-platform/core/src/Core/DataProvider/OperationDataProviderTrait.php:90
/home/www/app/vendor/api-platform/core/src/Core/EventListener/ReadListener.php:130
/home/www/app/vendor/symfony/event-dispatcher/Debug/WrappedListener.php:115
/home/www/app/vendor/symfony/event-dispatcher/EventDispatcher.php:230
/home/www/app/vendor/symfony/event-dispatcher/EventDispatcher.php:59
/home/www/app/vendor/symfony/event-dispatcher/Debug/TraceableEventDispatcher.php:153
/home/www/app/vendor/symfony/http-kernel/HttpKernel.php:129
/home/www/app/vendor/symfony/http-kernel/HttpKernel.php:75
/home/www/app/vendor/symfony/http-kernel/Kernel.php:202
/home/www/app/vendor/symfony/http-kernel/HttpKernelBrowser.php:65
/home/www/app/vendor/symfony/framework-bundle/KernelBrowser.php:172
/home/www/app/vendor/symfony/browser-kit/AbstractBrowser.php:370
/home/www/app/vendor/api-platform/core/src/Symfony/Bundle/Test/Client.php:122
/home/www/app/tests/Test.php:85

ERRORS!
Tests: 1, Assertions: 0, Errors: 1.

Remaining indirect deprecation notices (17)

Other deprecation notices (25)
```

### Decorating the service
On v2.7.2 the error goes away when the provider service is decorated, instead of injecting the provider as an argument:

from:
```yaml
services:
    App\ApiPlatform\DataProvider\MyCollectionDataProvider:
      arguments:
        $collectionDataProvider: '@api_platform.elasticsearch.collection_data_provider'
```
to
```yaml
services:
    App\ApiPlatform\DataProvider\MyCollectionDataProvider:
      decorates: 'api_platform.elasticsearch.collection_data_provider'
```

However, this changes the output of the test. 
```
There was 1 failure:

1) App\Tests\Test::testGetMyEntities
Failed asserting that two arrays are identical.
--- Expected
+++ Actual
@@ @@
     '@context' => '/api/contexts/MyOtherEntity'
     '@id' => '/api/my_entities/48e73400-4361-46b3-8d99-d9d6f4b256a1/my_other_entities'
     '@type' => 'hydra:Collection'
-    'hydra:member' => Array &1 (
-        0 => Array &2 (
-            '@id' => '/api/my_other_entities/48e73400-4361-46b3-8d99-d9d6f4b256a1'
-            '@type' => 'MyOtherEntity'
-            'id' => '48e73400-4361-46b3-8d99-d9d6f4b256a1'
-            'description' => 'first-description'
-        )
-        1 => Array &3 (
-            '@id' => '/api/my_other_entities/b1f085bb-a92d-4122-a547-0ea44ee4956f'
-            '@type' => 'MyOtherEntity'
-            'id' => 'b1f085bb-a92d-4122-a547-0ea44ee4956f'
-            'description' => 'second-description'
-        )
-    )
-    'hydra:totalItems' => 2
+    'hydra:member' => Array &1 ()
+    'hydra:totalItems' => 0
 )
```


## How to check output on APIP 2.6.8
- `docker compose exec php composer require api-platform/core:v2.6.8`
- `docker-compose exec php bin/phpunit`

### Output
```
Testing 
.                                                                   1 / 1 (100%)

Time: 00:00.704, Memory: 50.50 MB

OK (1 test, 1 assertion)

Remaining indirect deprecation notices (37)
```
