<?php

namespace App\Repository;

use App\Entity\FamilleAnimal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FamilleAnimal>
 *
 * @method FamilleAnimal|null find($id, $lockMode = null, $lockVersion = null)
 * @method FamilleAnimal|null findOneBy(array $criteria, array $orderBy = null)
 * @method FamilleAnimal[]    findAll()
 * @method FamilleAnimal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FamilleAnimalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FamilleAnimal::class);
    }

    /**
     * Méthode de classe de FamilleAnimal Repository.
     *
     * Retourne une liste aléatoire de $number famille d'animaux.
     *
     * @return FamilleAnimal[]
     */
    public function findSomeRandom(int $number): array
    {
        $allList = $this->findAll();
        shuffle($allList);
        $maxNumber = count($allList);
        if ($number > $maxNumber) {
            $number = $maxNumber;
        }

        return array_slice($allList, 0, $number);
    }
    //    /**
    //     * @return FamilleAnimal[] Returns an array of FamilleAnimal objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('f.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?FamilleAnimal
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
