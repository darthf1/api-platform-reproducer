<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/api(?'
                    .'|/\\.well\\-known/genid/([^/]++)(*:43)'
                    .'|(?:/(index)(?:\\.([^/]++))?)?(*:78)'
                    .'|/(?'
                        .'|docs(?:\\.([^/]++))?(*:108)'
                        .'|contexts/([^.]+)(?:\\.(jsonld))?(*:147)'
                        .'|my_(?'
                            .'|entities(?'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:190)'
                                .')'
                                .'|/(?'
                                    .'|([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:231)'
                                    .')'
                                    .'|([^/]++)/my_other_entities(?:\\.([^/]++))?(*:281)'
                                .')'
                            .')'
                            .'|other_entities(?'
                                .'|(?:\\.([^/]++))?(*:323)'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:357)'
                            .')'
                        .')'
                    .')'
                .')'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:397)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        43 => [[['_route' => 'api_genid', '_controller' => 'api_platform.action.not_exposed', '_api_respond' => 'true'], ['id'], null, null, false, true, null]],
        78 => [[['_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index', '_format'], null, null, false, true, null]],
        108 => [[['_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], ['_format'], null, null, false, true, null]],
        147 => [[['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName', '_format'], null, null, false, true, null]],
        190 => [
            [['_route' => 'api_my_entities_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\MyEntity', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_exception_to_status' => [], '_api_operation_name' => 'api_my_entities_get_collection', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_my_entities_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\MyEntity', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_exception_to_status' => [], '_api_operation_name' => 'api_my_entities_post_collection', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        231 => [
            [['_route' => 'api_my_entities_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\MyEntity', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_exception_to_status' => [], '_api_operation_name' => 'api_my_entities_get_item', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_my_entities_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\MyEntity', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_exception_to_status' => [], '_api_operation_name' => 'api_my_entities_delete_item', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_my_entities_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\MyEntity', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_exception_to_status' => [], '_api_operation_name' => 'api_my_entities_put_item', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_my_entities_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\MyEntity', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_exception_to_status' => [], '_api_operation_name' => 'api_my_entities_patch_item', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        281 => [[['_route' => 'api_my_entities_my_other_entities_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\MyOtherEntity', '_api_identifiers' => ['id' => ['App\\Entity\\MyEntity', 'id', true]], '_api_has_composite_identifier' => false, '_api_subresource_operation_name' => 'api_my_entities_my_other_entities_get_subresource', '_api_subresource_context' => ['property' => 'myOtherEntities', 'identifiers' => ['id' => ['App\\Entity\\MyEntity', 'id', true]], 'collection' => true, 'operationId' => 'api_my_entities_my_other_entities_get_subresource']], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        323 => [[['_route' => 'api_my_other_entities_GET_collection', '_controller' => 'ApiPlatform\\Core\\Action\\NotFoundAction', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\MyOtherEntity', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_exception_to_status' => [], '_api_operation_name' => 'api_my_other_entities_GET_collection', '_api_collection_operation_name' => 'GET'], ['_format'], ['GET' => 0], null, false, true, null]],
        357 => [[['_route' => 'api_my_other_entities_GET_item', '_controller' => 'ApiPlatform\\Core\\Action\\NotFoundAction', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\MyOtherEntity', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_exception_to_status' => [], '_api_operation_name' => 'api_my_other_entities_GET_item', '_api_item_operation_name' => 'GET'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        397 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
