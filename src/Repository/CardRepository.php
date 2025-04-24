<?php

namespace App\Repository;

use App\Entity\Card;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Card>
 */
class CardRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Card::class);
    }

        /**
         * @return int Returns an number of Cards
         */
        public function countByExtension(int $extensionId): int
        {
            return $this->createQueryBuilder('c')
                ->select('COUNT(c.id)')
                ->where('c.extension = :extensionId')
                ->setParameter('extensionId', $extensionId)
                ->getQuery()
                ->getSingleScalarResult()
            ;
        }

        /**
         * @return int Returns an number of Cards
         */
        public function countPossesedByExtension(int $extensionId): int
        {
            return $this->createQueryBuilder('c')
                ->select('COUNT(c.id)')
                ->where('c.extension = :extensionId')
                ->andWhere('c.quantity >= 1')
                ->setParameter('extensionId', $extensionId)
                ->getQuery()
                ->getSingleScalarResult()
            ;
        }

    //    /**
    //     * @return Card[] Returns an array of Card objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Card
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
