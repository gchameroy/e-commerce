<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Psr\SimpleCache\CacheInterface;

abstract class AbstractService implements ServiceInterface
{
    private $cache;
    private $em;
    private $entityName;
    private $repository;
    private $cacheKey;

    public function __construct(CacheInterface $cache, EntityManagerInterface $em, string $entityName, string $cacheKey)
    {
        $this->cache = $cache;
        $this->em = $em;
        $this->entityName = $entityName;
        $this->repository = $em->getRepository($entityName);
        $this->cacheKey = $cacheKey;
    }

    public function getList(): array
    {
        $cacheKey = $this->cacheKey . '.list';
        $entities = $this->cache->get($cacheKey, $this->repository->findAll());
        if (!$this->cache->has($cacheKey)) {
            $this->cache->set($cacheKey, $entities);
        }

        return $entities;
    }
}
