<?php

namespace Cituao\CoordBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Asesoria5
 */
class Asesoria5
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
    private $docAsesor5;

    /**
     * @var string
     */
    private $docPracticante5;


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
     * @return Asesoria5
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
     * @return Asesoria5
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
     * Set docAsesor5
     *
     * @param string $docAsesor5
     * @return Asesoria5
     */
    public function setDocAsesor5($docAsesor5)
    {
        $this->docAsesor5 = $docAsesor5;
    
        return $this;
    }

    /**
     * Get docAsesor5
     *
     * @return string 
     */
    public function getDocAsesor5()
    {
        return $this->docAsesor5;
    }

    /**
     * Set docPracticante5
     *
     * @param string $docPracticante5
     * @return Asesoria5
     */
    public function setDocPracticante5($docPracticante5)
    {
        $this->docPracticante5 = $docPracticante5;
    
        return $this;
    }

    /**
     * Get docPracticante5
     *
     * @return string 
     */
    public function getDocPracticante5()
    {
        return $this->docPracticante5;
    }
}
