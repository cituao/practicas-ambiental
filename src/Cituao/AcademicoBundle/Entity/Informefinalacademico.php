<?php

namespace Cituao\AcademicoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Informefinalacademico
 */
class Informefinalacademico
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
    private $metodologia;

    /**
     * @var string
     */
    private $competencia;

    /**
     * @var string
     */
    private $recomendaciones;


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
     * @return Informefinalacademico
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
     * @return Informefinalacademico
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
     * Set metodologia
     *
     * @param string $metodologia
     * @return Informefinalacademico
     */
    public function setMetodologia($metodologia)
    {
        $this->metodologia = $metodologia;
    
        return $this;
    }

    /**
     * Get metodologia
     *
     * @return string 
     */
    public function getMetodologia()
    {
        return $this->metodologia;
    }

    /**
     * Set competencia
     *
     * @param string $competencia
     * @return Informefinalacademico
     */
    public function setCompetencia($competencia)
    {
        $this->competencia = $competencia;
    
        return $this;
    }

    /**
     * Get competencia
     *
     * @return string 
     */
    public function getCompetencia()
    {
        return $this->competencia;
    }

    /**
     * Set recomendaciones
     *
     * @param string $recomendaciones
     * @return Informefinalacademico
     */
    public function setRecomendaciones($recomendaciones)
    {
        $this->recomendaciones = $recomendaciones;
    
        return $this;
    }

    /**
     * Get recomendaciones
     *
     * @return string 
     */
    public function getRecomendaciones()
    {
        return $this->recomendaciones;
    }
}