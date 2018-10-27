<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;

abstract class AbstractService implements ServiceInterface
{
    private $em;
    private $entityName;
    private $repository;
    private $cacheKey;

    public function __construct(EntityManagerInterface $em, string $entityName, string $cacheKey)
    {
        $this->em = $em;
        $this->entityName = $entityName;
        $this->repository = $em->getRepository($entityName);
        $this->cacheKey = $cacheKey;
    }

    public function getList(): array
    {
        return $this->repository->findAll();
    }
}
