<?php

namespace App\Repository;

use App\Entity\LineCommande;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LineCommande>
 *
 * @method LineCommande|null find($id, $lockMode = null, $lockVersion = null)
 * @method LineCommande|null findOneBy(array $criteria, array $orderBy = null)
 * @method LineCommande[]    findAll()
 * @method LineCommande[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LineCommandeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LineCommande::class);
    }

//    /**
//     * @return LineCommande[] Returns an array of LineCommande objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?LineCommande
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
