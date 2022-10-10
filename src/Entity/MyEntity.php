<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;

#[ApiResource]
class MyEntity
{
    #[ApiProperty(identifier: true)]
    public string $id;

    public string $description;

    /**
     * @var MyOtherEntity[]
     */
    #[ApiSubresource(maxDepth: 1)]
    public array $myOtherEntities = [];
}