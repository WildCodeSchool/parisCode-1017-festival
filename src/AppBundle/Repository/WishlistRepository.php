<?php

namespace AppBundle\Repository;

/**
 * WishlistRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class WishlistRepository extends \Doctrine\ORM\EntityRepository
{
    public function calendar($id)
    {
//        $qb1 = $this->createQueryBuilder('w');
//        $qb1->select('w.id')
//            ->addSelect( 'concert.id as concert_id', 'concert.dateStart as start', 'concert.dateEnd as end')
//            ->leftJoin('w.concert', 'concert')
//            ->where('w.user = :user')
//            ->setParameter('user', $id);
//
//        $qb2 = $this->createQueryBuilder('w');
//        $qb2->select('w.id')
//            ->addSelect( 'festival.id as festival_id', 'festival.start as start', 'festival.end as end')
//            ->leftJoin('w.festival', 'festival')
//            ->where('w.user = :user')
//            ->setParameter('user', $id);
//
//        $arr1 = $qb1->getQuery()->getResult();
//        $arr2 = $qb2->getQuery()->getResult();
//        $qbs = array_merge($arr1, $arr2);
//
//        return $qbs;
    }

}
