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