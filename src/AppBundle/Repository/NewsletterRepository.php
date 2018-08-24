<?php
/**
 * Created by PhpStorm.
 * User: kriss
 * Date: 24/08/2018
 * Time: 15:35
 */

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Newsletter;

class NewsletterRepository extends EntityRepository
{
    /**
     * @return array
     */
    public function findLastNewsEdit(){
        return $this->createQueryBuilder("b")
            ->select("b")
            ->where("b.send = :send")
            ->setParameter("send", true)
            ->orderBy("b.id", "DESC")
            ->setMaxResults(1)
            ->getQuery()
            ->getResult();

    }

}