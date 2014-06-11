<?php

namespace Cituao\CoordBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Asesoria6
 */
class Asesoria6
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
    private $docAsesor6;

    /**
     * @var string
     */
    private $docPracticante6;


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
     * @return Asesoria6
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
     * @return Asesoria6
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
     * Set docAsesor6
     *
     * @param string $docAsesor6
     * @return Asesoria6
     */
    public function setDocAsesor6($docAsesor6)
    {
        $this->docAsesor6 = $docAsesor6;
    
        return $this;
    }

    /**
     * Get docAsesor6
     *
     * @return string 
     */
    public function getDocAsesor6()
    {
        return $this->docAsesor6;
    }

    /**
     * Set docPracticante6
     *
     * @param string $docPracticante6
     * @return Asesoria6
     */
    public function setDocPracticante6($docPracticante6)
    {
        $this->docPracticante6 = $docPracticante6;
    
        return $this;
    }

    /**
     * Get docPracticante6
     *
     * @return string 
     */
    public function getDocPracticante6()
    {
        return $this->docPracticante6;
    }
}
