<?php

namespace Cituao\CoordBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Asesoria3
 */
class Asesoria3
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $practicante;

    /**
     * @var integer
     */
    private $academico;

    /**
     * @var string
     */
    private $docAsesor3;

    /**
     * @var string
     */
    private $docPracticante3;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set practicante
     *
     * @param integer $practicante
     * @return Asesoria3
     */
    public function setPracticante($practicante)
    {
        $this->practicante = $practicante;
    
        return $this;
    }

    /**
     * Get practicante
     *
     * @return integer 
     */
    public function getPracticante()
    {
        return $this->practicante;
    }

    /**
     * Set academico
     *
     * @param integer $academico
     * @return Asesoria3
     */
    public function setAcademico($academico)
    {
        $this->academico = $academico;
    
        return $this;
    }

    /**
     * Get academico
     *
     * @return integer 
     */
    public function getAcademico()
    {
        return $this->academico;
    }

    /**
     * Set docAsesor3
     *
     * @param string $docAsesor3
     * @return Asesoria3
     */
    public function setDocAsesor3($docAsesor3)
    {
        $this->docAsesor3 = $docAsesor3;
    
        return $this;
    }

    /**
     * Get docAsesor3
     *
     * @return string 
     */
    public function getDocAsesor3()
    {
        return $this->docAsesor3;
    }

    /**
     * Set docPracticante3
     *
     * @param string $docPracticante3
     * @return Asesoria3
     */
    public function setDocPracticante3($docPracticante3)
    {
        $this->docPracticante3 = $docPracticante3;
    
        return $this;
    }

    /**
     * Get docPracticante3
     *
     * @return string 
     */
    public function getDocPracticante3()
    {
        return $this->docPracticante3;
    }
}