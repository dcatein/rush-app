<?php

namespace Src\Infrastructure\Persistence;

use Src\Domain\Products\Product;
use Src\Application\Repositories\ProductsRepository;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineProductsRepository implements ProductsRepository
{
    /**
     * @var EntityManagerInterface
     */
    protected EntityManagerInterface $em;

    /**
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function save(Product $product): void
    {
        $this->em->persist($product);
        $this->em->flush();
    }

    public function findByName(string $name): array
    {
        $query = $this->em->createQueryBuilder();
        $query->select('p.id, p.name, p.value')
            ->from('Src\Domain\Products\Product', 'p')
            ->where($query->expr()->like('p.name', '?1'))
        ->setParameter(1, $name);

        return $query->getQuery()->getResult();

    }
}
