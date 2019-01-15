<?php

namespace App\Repository;

use App\Entity\EntityType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EntityType|null find($id, $lockMode = null, $lockVersion = null)
 * @method EntityType|null findOneBy(array $criteria, array $orderBy = null)
 * @method EntityType[]    findAll()
 * @method EntityType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EntityTypeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EntityType::class);
    }

    // /**
    //  * @return EntityType[] Returns an array of EntityType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EntityType
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
