<?php

namespace App\Infrastructure\Persistence;

use App\Domain\Products\Product;
use App\Application\Repositories\ProductsRepository;
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
            ->from('App\Domain\Products\Product', 'p')
            ->where($query->expr()->like('p.name', '?1'))
        ->setParameter(1, $name);

        return $query->getQuery()->getResult();

    }
}
