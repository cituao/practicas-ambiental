<?php

namespace Cituao\CoordBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Asesoria
 */
class Asesoria
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
    private $docAsesor1;

    /**
     * @var string
     */
    private $docPracticante1;

    /**
     * @var string
     */
    private $docAsesor2;

    /**
     * @var string
     */
    private $docPracticante2;

    /**
     * @var string
     */
    private $docAsesor3;

    /**
     * @var string
     */
    private $docPracticante3;

    /**
     * @var string
     */
    private $docAsesor4;

    /**
     * @var string
     */
    private $docPracticante4;

    /**
     * @var string
     */
    private $docAsesor5;

    /**
     * @var string
     */
    private $docPracticante5;

    /**
     * @var string
     */
    private $docAsesor6;

    /**
     * @var string
     */
    private $docPracticante6;

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
     * @return Asesoria
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
     * Set docAsesor1
     *
     * @param string $docAsesor1
     * @return Asesoria
     */
    public function setDocAsesor1($docAsesor1)
    {
        $this->docAsesor1 = $docAsesor1;
    
        return $this;
    }

    /**
     * Get docAsesor1
     *
     * @return string 
     */
    public function getDocAsesor1()
    {
        return $this->docAsesor1;
    }

    /**
     * Set docPracticante1
     *
     * @param string $docPracticante1
     * @return Asesoria
     */
    public function setDocPracticante1($docPracticante1)
    {
        $this->docPracticante1 = $docPracticante1;
    
        return $this;
    }

    /**
     * Get docPracticante1
     *
     * @return string 
     */
    public function getDocPracticante1()
    {
        return $this->docPracticante1;
    }

    /**
     * Set docAsesor2
     *
     * @param string $docAsesor2
     * @return Asesoria
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
     * @return Asesoria
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

    /**
     * Set docAsesor3
     *
     * @param string $docAsesor3
     * @return Asesoria
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
     * @return Asesoria
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

    /**
     * Set docAsesor4
     *
     * @param string $docAsesor4
     * @return Asesoria
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
     * @return Asesoria
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

    /**
     * Set docAsesor5
     *
     * @param string $docAsesor5
     * @return Asesoria
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
     * @return Asesoria
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

    /**
     * Set docAsesor6
     *
     * @param string $docAsesor6
     * @return Asesoria
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
     * @return Asesoria
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

    /**
     * Set docAsesor7
     *
     * @param string $docAsesor7
     * @return Asesoria
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
     * @return Asesoria
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