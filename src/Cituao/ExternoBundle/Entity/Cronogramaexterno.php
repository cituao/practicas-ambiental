<?php

namespace Cituao\ExternoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cronogramaexterno
 */
class Cronogramaexterno
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
     * @var \DateTime
     */
    private $fechaEvaluacion1;

    /**
     * @var \DateTime
     */
    private $fechaEvaluacion2;

    /**
     * @var \DateTime
     */
    private $fechaActa;

    /**
     * @var boolean
     */
    private $listoEvaluacion1;

    /**
     * @var boolean
     */
    private $listoEvaluacion2;

    /**
     * @var boolean
     */
    private $listoActa;


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
     * @return Cronogramaexterno
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
     * Set fechaEvaluacion1
     *
     * @param \DateTime $fechaEvaluacion1
     * @return Cronogramaexterno
     */
    public function setFechaEvaluacion1($fechaEvaluacion1)
    {
        $this->fechaEvaluacion1 = $fechaEvaluacion1;
    
        return $this;
    }

    /**
     * Get fechaEvaluacion1
     *
     * @return \DateTime 
     */
    public function getFechaEvaluacion1()
    {
        return $this->fechaEvaluacion1;
    }

    /**
     * Set fechaEvaluacion2
     *
     * @param \DateTime $fechaEvaluacion2
     * @return Cronogramaexterno
     */
    public function setFechaEvaluacion2($fechaEvaluacion2)
    {
        $this->fechaEvaluacion2 = $fechaEvaluacion2;
    
        return $this;
    }

    /**
     * Get fechaEvaluacion2
     *
     * @return \DateTime 
     */
    public function getFechaEvaluacion2()
    {
        return $this->fechaEvaluacion2;
    }

    /**
     * Set fechaActa
     *
     * @param \DateTime $fechaActa
     * @return Cronogramaexterno
     */
    public function setFechaActa($fechaActa)
    {
        $this->fechaActa = $fechaActa;
    
        return $this;
    }

    /**
     * Get fechaActa
     *
     * @return \DateTime 
     */
    public function getFechaActa()
    {
        return $this->fechaActa;
    }

    /**
     * Set listoEvaluacion1
     *
     * @param boolean $listoEvaluacion1
     * @return Cronogramaexterno
     */
    public function setListoEvaluacion1($listoEvaluacion1)
    {
        $this->listoEvaluacion1 = $listoEvaluacion1;
    
        return $this;
    }

    /**
     * Get listoEvaluacion1
     *
     * @return boolean 
     */
    public function getListoEvaluacion1()
    {
        return $this->listoEvaluacion1;
    }

    /**
     * Set listoEvaluacion2
     *
     * @param boolean $listoEvaluacion2
     * @return Cronogramaexterno
     */
    public function setListoEvaluacion2($listoEvaluacion2)
    {
        $this->listoEvaluacion2 = $listoEvaluacion2;
    
        return $this;
    }

    /**
     * Get listoEvaluacion2
     *
     * @return boolean 
     */
    public function getListoEvaluacion2()
    {
        return $this->listoEvaluacion2;
    }

    /**
     * Set listoActa
     *
     * @param boolean $listoActa
     * @return Cronogramaexterno
     */
    public function setListoActa($listoActa)
    {
        $this->listoActa = $listoActa;
    
        return $this;
    }

    /**
     * Get listoActa
     *
     * @return boolean 
     */
    public function getListoActa()
    {
        return $this->listoActa;
    }
    /**
     * @var integer
     */
    private $externo;


    /**
     * Set externo
     *
     * @param integer $externo
     * @return Cronogramaexterno
     */
    public function setExterno($externo)
    {
        $this->externo = $externo;
    
        return $this;
    }

    /**
     * Get externo
     *
     * @return integer 
     */
    public function getExterno()
    {
        return $this->externo;
    }
}