<?php

namespace App\Entity;

use ApiPlatform\Core\Action\NotFoundAction;
use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

#[ApiResource(
    attributes: [
        'order' => [
            '_id' => 'ASC',
        ],
    ],
    collectionOperations: [
        Request::METHOD_GET => [
            'controller' => NotFoundAction::class,
            'read' => false,
            'output' => false,
            'status' => Response::HTTP_NOT_FOUND,
        ],
    ],
    itemOperations: [
        Request::METHOD_GET => [
            'controller' => NotFoundAction::class,
            'read' => false,
            'output' => false,
            'status' => Response::HTTP_NOT_FOUND,
        ],
    ],
)]
class MyOtherEntity
{
    #[ApiProperty(identifier: true)]
    public string $id;

    public string $description;
}