<?php

namespace App\Repository;

use App\Entity\Room;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Room>
 *
 * @method Room|null find($id, $lockMode = null, $lockVersion = null)
 * @method Room|null findOneBy(array $criteria, array $orderBy = null)
 * @method Room[]    findAll()
 * @method Room[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RoomRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Room::class);
    }


    // création de la fonction liste_Salle_Cmplete

    public function listeSallesComplete () : ?Query
    {
        return $this->createQueryBuilder('s')
            ->select('s', 'se')// selection des tables | s salle
            ->leftJoin('s.sessions', 'se')
            ->orderBy('s.id')
            ->getQuery(); 
    }

    public function listeSallesCompleteAdmin () : ?Query
    {
        return $this->createQueryBuilder('s')
            ->select('s', 'se')// selection des tables | s salle
            ->leftJoin('s.sessions', 'se')
            ->orderBy('s.id')
            ->getQuery(); 
    }

//    /**
//     * @return Room[] Returns an array of Room objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Room
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
