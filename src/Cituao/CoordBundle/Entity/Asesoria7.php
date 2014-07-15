<?php

namespace Cituao\CoordBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Asesoria7
 */
class Asesoria7
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
    private $docAsesor7;

    /**
     * @var string
     */
    private $docPracticante7;


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
     * @return Asesoria7
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
     * @return Asesoria7
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
     * Set docAsesor7
     *
     * @param string $docAsesor7
     * @return Asesoria7
     */
    public function setDocAsesor7($docAsesor7)
    {
        $this->docAsesor7 = $docAsesor7;
    
        return $this;
    }

    /**
     * Get docAsesor7
     *
     * @return string 
     */
    public function getDocAsesor7()
    {
        return $this->docAsesor7;
    }

    /**
     * Set docPracticante7
     *
     * @param string $docPracticante7
     * @return Asesoria7
     */
    public function setDocPracticante7($docPracticante7)
    {
        $this->docPracticante7 = $docPracticante7;
    
        return $this;
    }

    /**
     * Get docPracticante7
     *
     * @return string 
     */
    public function getDocPracticante7()
    {
        return $this->docPracticante7;
    }
}