<?php

namespace App\Repository;

use App\Entity\Event;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Event>
 *
 * @method Event|null find($id, $lockMode = null, $lockVersion = null)
 * @method Event|null findOneBy(array $criteria, array $orderBy = null)
 * @method Event[]    findAll()
 * @method Event[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Event::class);
    }

    /**
     * Méthode de classe de Event Repository.
     *
     * Retourne une liste aléatoire de $number event.
     *
     * @return Event[]
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

    /**
     * Méthode de classe de Event Repository.
     * Retourne une liste d'event dont le nom contient la chaîne de caractère passée en paramètre.
     *
     * @param string $txt chaîne de caractère à rechercher
     *
     * @return array Liste d'événements
     */
    public function findSearch(string $txt = '')
    {
        $request = $this->createQueryBuilder('event')
            ->where('event.nomEvent LIKE :txt')
            ->setParameter(':txt', '%'.$txt.'%')
            ->orderBy('event.nomEvent');
        $query = $request->getQuery()->execute();

        return array_filter($query, function ($item) {
            return $item instanceof Event;
        });
    }

    public function findFromDateToN(\DateTime $date, int $nbJours): array
    {
        --$nbJours;
        $request = $this->createQueryBuilder()->select('e')
            ->from('event', 'e')
            ->join('asso_event_date', 'aed')
            ->join('date_event', 'de')
            ->where('de.date_event >= :dateDeb')
            ->andWhere('de.date_event <= :dateFin')
            ->setParameter(':dateDeb', $date)
            ->setParameter('dateFin', $date->modify("+${$nbJours} day"));
        $query = $request->getQuery()->execute();

        return array_filter($query, function ($item) {
            return $item instanceof Event;
        });
    }
    //    /**
    //     * @return Event[] Returns an array of Event objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('e.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Event
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
