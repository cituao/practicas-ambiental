<?php

namespace Cituao\CoordBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Asesoria4
 */
class Asesoria4
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
    private $docAsesor4;

    /**
     * @var string
     */
    private $docPracticante4;


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
     * @return Asesoria4
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
     * @return Asesoria4
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
     * Set docAsesor4
     *
     * @param string $docAsesor4
     * @return Asesoria4
     */
    public function setDocAsesor4($docAsesor4)
    {
        $this->docAsesor4 = $docAsesor4;
    
        return $this;
    }

    /**
     * Get docAsesor4
     *
     * @return string 
     */
    public function getDocAsesor4()
    {
        return $this->docAsesor4;
    }

    /**
     * Set docPracticante4
     *
     * @param string $docPracticante4
     * @return Asesoria4
     */
    public function setDocPracticante4($docPracticante4)
    {
        $this->docPracticante4 = $docPracticante4;
    
        return $this;
    }

    /**
     * Get docPracticante4
     *
     * @return string 
     */
    public function getDocPracticante4()
    {
        return $this->docPracticante4;
    }
}
