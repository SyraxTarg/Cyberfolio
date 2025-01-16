<?php

namespace App\Repository;

use App\Entity\CentresInteret;
use App\Entity\Project;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CentresInteret>
 * @method CentresInteret|null find($id, $lockMode = null, $lockVersion = null)
 * @method CentresInteret|null findOneBy(array $criteria, array $orderBy = null)
 * @method CentresInteret[]    findAll()
 * @method CentresInteret[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CentresInteretsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CentresInteret::class);
    }

    //    /**
    //     * @return CentresInteret[] Returns an array of CentresInteret objects
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

    //    public function findOneBySomeField($value): ?CentresInteret
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
