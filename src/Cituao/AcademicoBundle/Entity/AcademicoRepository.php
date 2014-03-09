<?php
// src/Cituao/AcademicoBundle/Entity/AcademicoRepository.php

namespace Cituao\AcademicoBundle\Entity;

use Doctrine\ORM\EntityRepository;


/**
 *
 *  @ORM\Entity(repositoryClass="Cituao\AcademicoBundle\Entity\AcademicoRepository")
 *  @ORM\Table(name="Academico")
 *
 */
class AcademicoRepository extends EntityRepository
{
    public function findOneByCuantosPracticantes($id)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT COUNT(p.id) FROM CituaoCoordBundle:Practicante p WHERE p.academico= :id'
            )->setParameter('id',$id)
            ->getResult();
    }
}
