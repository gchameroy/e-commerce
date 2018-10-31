<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;

abstract class AbstractService implements ServiceInterface
{
    private $em;
    private $entityName;
    private $repository;

    public function __construct(EntityManagerInterface $em, string $entityName)
    {
        $this->em = $em;
        $this->entityName = $entityName;
        $this->repository = $em->getRepository($entityName);
    }

    public function getRepository()
    {
        return $this->repository;
    }

    public function getList(): array
    {
        return $this->repository->findAll();
    }
}
