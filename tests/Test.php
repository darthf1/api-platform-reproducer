<?php

namespace App\Tests;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use Elasticsearch\Client;

class Test extends ApiTestCase
{
    protected function setUp(): void
    {
        /** @var Client $esClient */
        $esClient = self::getContainer()->get(Client::class);
        $esClient->indices()->delete([
            'index' => '*',
        ]);

        $mapping = [
            'settings' => [
                'number_of_replicas' => 1,
                'number_of_shards' => 1,
                'refresh_interval' => '1s',
            ],
            'mappings' => [
                'dynamic' => 'strict',
                'properties' => [
                    'description' => [
                        'type' => 'keyword',
                    ],
                ]
            ]
        ];

        $indexName = 'my_entities';
        $esClient->indices()->create([
            'index' => $indexName,
            'body' => $mapping,
        ]);

        $this->addDocuments($esClient, [
            [
                'index' => $indexName,
                'id' => '48e73400-4361-46b3-8d99-d9d6f4b256a1',
                'body' => [
                    'description' => 'first-description',
                ],
            ],
            [
                'index' => $indexName,
                'id' => 'b1f085bb-a92d-4122-a547-0ea44ee4956f',
                'body' => [
                    'description' => 'second-description',
                ],
            ],
        ]);

        $indexName = 'my_other_entity';
        $esClient->indices()->create([
            'index' => $indexName,
            'body' => $mapping,
        ]);

        $this->addDocuments($esClient, [
            [
                'index' => $indexName,
                'id' => '48e73400-4361-46b3-8d99-d9d6f4b256a1',
                'body' => [
                    'description' => 'first-description',
                ],
            ],
            [
                'index' => $indexName,
                'id' => 'b1f085bb-a92d-4122-a547-0ea44ee4956f',
                'body' => [
                    'description' => 'second-description',
                ],
            ],
        ]);

    }

    public function testGetMyEntities(): void
    {
        $client = self::createClient();
        $response = $client->request('GET', '/api/my_entities/48e73400-4361-46b3-8d99-d9d6f4b256a1/my_other_entities');

        self::assertResponseIsSuccessful();
        self::assertSame([
            '@context' => '/api/contexts/MyOtherEntity',
            '@id' => '/api/my_entities/48e73400-4361-46b3-8d99-d9d6f4b256a1/my_other_entities',
            '@type' => 'hydra:Collection',
            'hydra:member' => [
                [
                     '@id' => '/api/my_other_entities/48e73400-4361-46b3-8d99-d9d6f4b256a1',
                     '@type' => 'MyOtherEntity',
                     'id' => '48e73400-4361-46b3-8d99-d9d6f4b256a1',
                     'description' => 'first-description',
                ],
                [
                     '@id' => '/api/my_other_entities/b1f085bb-a92d-4122-a547-0ea44ee4956f',
                     '@type' => 'MyOtherEntity',
                     'id' => 'b1f085bb-a92d-4122-a547-0ea44ee4956f',
                     'description' => 'second-description',
                ]
            ],
            'hydra:totalItems' => 2,
        ], $response->toArray());
    }

    /**
     * @see https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/indexing_documents.html
     */
    private function addDocuments(Client $client, iterable $documents): void
    {
        $indices = [];
        $params = [
            'body' => [],
        ];

        foreach ($documents as $document) {
            $indices[$document['index']] = $document['index'];

            $params['body'][] = [
                'index' => [
                    '_index' => $document['index'],
                    '_id' => $document['id'],
                ],
            ];

            $params['body'][] = $document['body'];
        }

        $client->bulk($params);

        $indices = implode(',', array_values($indices));
        $client->indices()->refresh([
            'index' => $indices,
        ]);
    }
}