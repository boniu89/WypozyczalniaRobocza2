<?php

namespace App\Repository;

use App\Entity\Egzemplarz;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Egzemplarz|null find($id, $lockMode = null, $lockVersion = null)
 * @method Egzemplarz|null findOneBy(array $criteria, array $orderBy = null)
 * @method Egzemplarz[]    findAll()
 * @method Egzemplarz[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EgzemplarzRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Egzemplarz::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Egzemplarz $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Egzemplarz $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return Egzemplarz[] Returns an array of Egzemplarz objects
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
    public function findOneBySomeField($value): ?Egzemplarz
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
