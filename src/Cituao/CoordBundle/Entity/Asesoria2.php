<?php

namespace Cituao\CoordBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Asesoria2
 */
class Asesoria2
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
    private $docAsesor2;

    /**
     * @var string
     */
    private $docPracticante2;


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
     * @return Asesoria2
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
     * @return Asesoria2
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
     * Set docAsesor2
     *
     * @param string $docAsesor2
     * @return Asesoria2
     */
    public function setDocAsesor2($docAsesor2)
    {
        $this->docAsesor2 = $docAsesor2;
    
        return $this;
    }

    /**
     * Get docAsesor2
     *
     * @return string 
     */
    public function getDocAsesor2()
    {
        return $this->docAsesor2;
    }

    /**
     * Set docPracticante2
     *
     * @param string $docPracticante2
     * @return Asesoria2
     */
    public function setDocPracticante2($docPracticante2)
    {
        $this->docPracticante2 = $docPracticante2;
    
        return $this;
    }

    /**
     * Get docPracticante2
     *
     * @return string 
     */
    public function getDocPracticante2()
    {
        return $this->docPracticante2;
    }
}