<?php

namespace Cituao\AcademicoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cualicuanti
 */
class Cualicuanti
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $academico;

    /**
     * @var integer
     */
    private $practicante;

    /**
     * @var string
     */
    private $actividad1;

    /**
     * @var string
     */
    private $descripcion1;

    /**
     * @var string
     */
    private $indicador1;

    /**
     * @var string
     */
    private $porcentaje1;

    /**
     * @var string
     */
    private $actividad2;

    /**
     * @var string
     */
    private $descripcion2;

    /**
     * @var string
     */
    private $indicador2;

    /**
     * @var string
     */
    private $porcentaje2;

    /**
     * @var string
     */
    private $actividad3;

    /**
     * @var string
     */
    private $descripcion3;

    /**
     * @var string
     */
    private $indicador3;

    /**
     * @var string
     */
    private $porcentaje3;

    /**
     * @var string
     */
    private $informe;


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
     * Set academico
     *
     * @param integer $academico
     * @return Cualicuanti
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
     * Set practicante
     *
     * @param integer $practicante
     * @return Cualicuanti
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
     * Set actividad1
     *
     * @param string $actividad1
     * @return Cualicuanti
     */
    public function setActividad1($actividad1)
    {
        $this->actividad1 = $actividad1;
    
        return $this;
    }

    /**
     * Get actividad1
     *
     * @return string 
     */
    public function getActividad1()
    {
        return $this->actividad1;
    }

    /**
     * Set descripcion1
     *
     * @param string $descripcion1
     * @return Cualicuanti
     */
    public function setDescripcion1($descripcion1)
    {
        $this->descripcion1 = $descripcion1;
    
        return $this;
    }

    /**
     * Get descripcion1
     *
     * @return string 
     */
    public function getDescripcion1()
    {
        return $this->descripcion1;
    }

    /**
     * Set indicador1
     *
     * @param string $indicador1
     * @return Cualicuanti
     */
    public function setIndicador1($indicador1)
    {
        $this->indicador1 = $indicador1;
    
        return $this;
    }

    /**
     * Get indicador1
     *
     * @return string 
     */
    public function getIndicador1()
    {
        return $this->indicador1;
    }

    /**
     * Set porcentaje1
     *
     * @param string $porcentaje1
     * @return Cualicuanti
     */
    public function setPorcentaje1($porcentaje1)
    {
        $this->porcentaje1 = $porcentaje1;
    
        return $this;
    }

    /**
     * Get porcentaje1
     *
     * @return string 
     */
    public function getPorcentaje1()
    {
        return $this->porcentaje1;
    }

    /**
     * Set actividad2
     *
     * @param string $actividad2
     * @return Cualicuanti
     */
    public function setActividad2($actividad2)
    {
        $this->actividad2 = $actividad2;
    
        return $this;
    }

    /**
     * Get actividad2
     *
     * @return string 
     */
    public function getActividad2()
    {
        return $this->actividad2;
    }

    /**
     * Set descripcion2
     *
     * @param string $descripcion2
     * @return Cualicuanti
     */
    public function setDescripcion2($descripcion2)
    {
        $this->descripcion2 = $descripcion2;
    
        return $this;
    }

    /**
     * Get descripcion2
     *
     * @return string 
     */
    public function getDescripcion2()
    {
        return $this->descripcion2;
    }

    /**
     * Set indicador2
     *
     * @param string $indicador2
     * @return Cualicuanti
     */
    public function setIndicador2($indicador2)
    {
        $this->indicador2 = $indicador2;
    
        return $this;
    }

    /**
     * Get indicador2
     *
     * @return string 
     */
    public function getIndicador2()
    {
        return $this->indicador2;
    }

    /**
     * Set actividad3
     *
     * @param string $actividad3
     * @return Cualicuanti
     */
    public function setActividad3($actividad3)
    {
        $this->actividad3 = $actividad3;
    
        return $this;
    }

    /**
     * Get actividad3
     *
     * @return string 
     */
    public function getActividad3()
    {
        return $this->actividad3;
    }

    /**
     * Set descripcion3
     *
     * @param string $descripcion3
     * @return Cualicuanti
     */
    public function setDescripcion3($descripcion3)
    {
        $this->descripcion3 = $descripcion3;
    
        return $this;
    }

    /**
     * Get descripcion3
     *
     * @return string 
     */
    public function getDescripcion3()
    {
        return $this->descripcion3;
    }

    /**
     * Set indicador3
     *
     * @param string $indicador3
     * @return Cualicuanti
     */
    public function setIndicador3($indicador3)
    {
        $this->indicador3 = $indicador3;
    
        return $this;
    }

    /**
     * Get indicador3
     *
     * @return string 
     */
    public function getIndicador3()
    {
        return $this->indicador3;
    }

    /**
     * Set porcentaje3
     *
     * @param string $porcentaje3
     * @return Cualicuanti
     */
    public function setPorcentaje3($porcentaje3)
    {
        $this->porcentaje3 = $porcentaje3;
    
        return $this;
    }

    /**
     * Get porcentaje3
     *
     * @return string 
     */
    public function getPorcentaje3()
    {
        return $this->porcentaje3;
    }

    /**
     * Set informe
     *
     * @param string $informe
     * @return Cualicuanti
     */
    public function setInforme($informe)
    {
        $this->informe = $informe;
    
        return $this;
    }

    /**
     * Get informe
     *
     * @return string 
     */
    public function getInforme()
    {
        return $this->informe;
    }
    /**
     * @var integer
     */
    private $cualicuanti;


    /**
     * Set cualicuanti
     *
     * @param integer $cualicuanti
     * @return Cualicuanti
     */
    public function setCualicuanti($cualicuanti)
    {
        $this->cualicuanti = $cualicuanti;
    
        return $this;
    }

    /**
     * Get cualicuanti
     *
     * @return integer 
     */
    public function getCualicuanti()
    {
        return $this->cualicuanti;
    }

    /**
     * Set porcentaje2
     *
     * @param string $porcentaje2
     * @return Cualicuanti
     */
    public function setPorcentaje2($porcentaje2)
    {
        $this->porcentaje2 = $porcentaje2;
    
        return $this;
    }

    /**
     * Get porcentaje2
     *
     * @return string 
     */
    public function getPorcentaje2()
    {
        return $this->porcentaje2;
    }
}
