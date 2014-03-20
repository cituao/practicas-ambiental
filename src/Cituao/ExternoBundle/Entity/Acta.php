<?php

namespace Cituao\ExternoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acta
 */
class Acta
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $externo;

    /**
     * @var integer
     */
    private $practicante;

    /**
     * @var string
     */
    private $actfun;

    /**
     * @var string
     */
    private $actfunueva;

    /**
     * @var string
     */
    private $acompana;

    /**
     * @var string
     */
    private $trabajo;

    /**
     * @var string
     */
    private $observaciones;

    /**
     * @var boolean
     */
    private $satisfaccion;


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
     * Set externo
     *
     * @param integer $externo
     * @return Acta
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

    /**
     * Set practicante
     *
     * @param integer $practicante
     * @return Acta
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
     * Set actfun
     *
     * @param string $actfun
     * @return Acta
     */
    public function setActfun($actfun)
    {
        $this->actfun = $actfun;
    
        return $this;
    }

    /**
     * Get actfun
     *
     * @return string 
     */
    public function getActfun()
    {
        return $this->actfun;
    }

    /**
     * Set actfunueva
     *
     * @param string $actfunueva
     * @return Acta
     */
    public function setActfunueva($actfunueva)
    {
        $this->actfunueva = $actfunueva;
    
        return $this;
    }

    /**
     * Get actfunueva
     *
     * @return string 
     */
    public function getActfunueva()
    {
        return $this->actfunueva;
    }

    /**
     * Set acompana
     *
     * @param string $acompana
     * @return Acta
     */
    public function setAcompana($acompana)
    {
        $this->acompana = $acompana;
    
        return $this;
    }

    /**
     * Get acompana
     *
     * @return string 
     */
    public function getAcompana()
    {
        return $this->acompana;
    }

    /**
     * Set trabajo
     *
     * @param string $trabajo
     * @return Acta
     */
    public function setTrabajo($trabajo)
    {
        $this->trabajo = $trabajo;
    
        return $this;
    }

    /**
     * Get trabajo
     *
     * @return string 
     */
    public function getTrabajo()
    {
        return $this->trabajo;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return Acta
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;
    
        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string 
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set satisfaccion
     *
     * @param boolean $satisfaccion
     * @return Acta
     */
    public function setSatisfaccion($satisfaccion)
    {
        $this->satisfaccion = $satisfaccion;
    
        return $this;
    }

    /**
     * Get satisfaccion
     *
     * @return boolean 
     */
    public function getSatisfaccion()
    {
        return $this->satisfaccion;
    }
    /**
     * @var string
     */
    private $aporte;


    /**
     * Set aporte
     *
     * @param string $aporte
     * @return Acta
     */
    public function setAporte($aporte)
    {
        $this->aporte = $aporte;
    
        return $this;
    }

    /**
     * Get aporte
     *
     * @return string 
     */
    public function getAporte()
    {
        return $this->aporte;
    }
    /**
     * @var string
     */
    private $negativo;


    /**
     * Set negativo
     *
     * @param string $negativo
     * @return Acta
     */
    public function setNegativo($negativo)
    {
        $this->negativo = $negativo;
    
        return $this;
    }

    /**
     * Get negativo
     *
     * @return string 
     */
    public function getNegativo()
    {
        return $this->negativo;
    }
}