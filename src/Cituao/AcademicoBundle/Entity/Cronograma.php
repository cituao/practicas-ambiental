<?php

namespace Cituao\AcademicoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cronograma
 */
class Cronograma
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
     * @var \Date
     */
    private $fechaAsesoria1;

    /**
     * @var \Date
     */
    private $fechaAsesoria2;

    /**
     * @var \Date
     */
    private $fechaAsesoria3;

    /**
     * @var \Date
     */
    private $fechaAsesoria4;

    /**
     * @var \Date
     */
    private $fechaAsesoria5;

    /**
     * @var \Date
     */
    private $fechaAsesoria6;

    /**
     * @var \Date
     */
    private $fechaAsesoria7;

    /**
     * @var \Date
     */
    private $fechaVisitaP;

    /**
     * @var \Date
     */
    private $fechaEvaluacion1;

    /**
     * @var \Date
     */
    private $fechaEvaluacion2;

    /**
     * @var \Date
     */
    private $fechaInformeGestion1;

    /**
     * @var \Date
     */
    private $fechaInformeGestion2;

    /**
     * @var \Date
     */
    private $fechaInformeGestion3;

    /**
     * @var \Date
     */
    private $fechaEvaluacionFinal;

    /**
     * @var boolean
     */
    private $listoAsesoria1;

    /**
     * @var boolean
     */
    private $listoAsesoria2;

    /**
     * @var boolean
     */
    private $listoAsesoria3;

    /**
     * @var boolean
     */
    private $listoAsesoria4;

    /**
     * @var boolean
     */
    private $listoAsesoria5;

    /**
     * @var boolean
     */
    private $listoAsesoria6;

    /**
     * @var boolean
     */
    private $listoAsesoria7;

    /**
     * @var boolean
     */
    private $listoVisitaP;

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
    private $listoGestion1;

    /**
     * @var boolean
     */
    private $listoGestion2;

    /**
     * @var boolean
     */
    private $listoGestion3;

    /**
     * @var boolean
     */
    private $listoEvaluacionFinal;

	/**
     * @var boolean
     */
    private $listoProyecto;

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
     * Set fechaAsesoria1
     *
     * @param \Date $fechaAsesoria1
     * @return Cronograma
     */
    public function setFechaAsesoria1($fechaAsesoria1)
    {
        $this->fechaAsesoria1 = $fechaAsesoria1;
    
        return $this;
    }

    /**
     * Get fechaAsesoria1
     *
     * @return \Date 
     */
    public function getFechaAsesoria1()
    {
        return $this->fechaAsesoria1;
    }

    /**
     * Set fechaAsesoria2
     *
     * @param \Date $fechaAsesoria2
     * @return Cronograma
     */
    public function setFechaAsesoria2($fechaAsesoria2)
    {
        $this->fechaAsesoria2 = $fechaAsesoria2;
    
        return $this;
    }

    /**
     * Get fechaAsesoria2
     *
     * @return \Date 
     */
    public function getFechaAsesoria2()
    {
        return $this->fechaAsesoria2;
    }

    /**
     * Set fechaAsesoria3
     *
     * @param \Date $fechaAsesoria3
     * @return Cronograma
     */
    public function setFechaAsesoria3($fechaAsesoria3)
    {
        $this->fechaAsesoria3 = $fechaAsesoria3;
    
        return $this;
    }

    /**
     * Get fechaAsesoria3
     *
     * @return \Date 
     */
    public function getFechaAsesoria3()
    {
        return $this->fechaAsesoria3;
    }

    /**
     * Set fechaAsesoria4
     *
     * @param \Date $fechaAsesoria4
     * @return Cronograma
     */
    public function setFechaAsesoria4($fechaAsesoria4)
    {
        $this->fechaAsesoria4 = $fechaAsesoria4;
    
        return $this;
    }

    /**
     * Get fechaAsesoria4
     *
     * @return \Date 
     */
    public function getFechaAsesoria4()
    {
        return $this->fechaAsesoria4;
    }

    /**
     * Set fechaAsesoria5
     *
     * @param \Date $fechaAsesoria5
     * @return Cronograma
     */
    public function setFechaAsesoria5($fechaAsesoria5)
    {
        $this->fechaAsesoria5 = $fechaAsesoria5;
    
        return $this;
    }

    /**
     * Get fechaAsesoria5
     *
     * @return \Date 
     */
    public function getFechaAsesoria5()
    {
        return $this->fechaAsesoria5;
    }

    /**
     * Set fechaAsesoria7
     *
     * @param \Date $fechaAsesoria7
     * @return Cronograma
     */
    public function setFechaAsesoria7($fechaAsesoria7)
    {
        $this->fechaAsesoria7 = $fechaAsesoria7;
    
        return $this;
    }

    /**
     * Get fechaAsesoria7
     *
     * @return \Date 
     */
    public function getFechaAsesoria7()
    {
        return $this->fechaAsesoria7;
    }

    /**
     * Set fechaVisitaP
     *
     * @param \Date $fechaVisitaP
     * @return Cronograma
     */
    public function setFechaVisitaP($fechaVisitaP)
    {
        $this->fechaVisitaP = $fechaVisitaP;
    
        return $this;
    }

    /**
     * Get fechaVisitaP
     *
     * @return \Date 
     */
    public function getFechaVisitaP()
    {
        return $this->fechaVisitaP;
    }

    /**
     * Set fechaEvaluacion1
     *
     * @param \Date $fechaEvaluacion1
     * @return Cronograma
     */
    public function setFechaEvaluacion1($fechaEvaluacion1)
    {
        $this->fechaEvaluacion1 = $fechaEvaluacion1;
    
        return $this;
    }

    /**
     * Get fechaEvaluacion1
     *
     * @return \Date 
     */
    public function getFechaEvaluacion1()
    {
        return $this->fechaEvaluacion1;
    }

    /**
     * Set fechaEvaluacion2
     *
     * @param \Date $fechaEvaluacion2
     * @return Cronograma
     */
    public function setFechaEvaluacion2($fechaEvaluacion2)
    {
        $this->fechaEvaluacion2 = $fechaEvaluacion2;
    
        return $this;
    }

    /**
     * Get fechaEvaluacion2
     *
     * @return \Date 
     */
    public function getFechaEvaluacion2()
    {
        return $this->fechaEvaluacion2;
    }

    /**
     * Set fechaInformeGestion1
     *
     * @param \Date $fechaInformeGestion1
     * @return Cronograma
     */
    public function setFechaInformeGestion1($fechaInformeGestion1)
    {
        $this->fechaInformeGestion1 = $fechaInformeGestion1;
    
        return $this;
    }

    /**
     * Get fechaInformeGestion1
     *
     * @return \Date 
     */
    public function getFechaInformeGestion1()
    {
        return $this->fechaInformeGestion1;
    }

    /**
     * Set fechaInformeGestion2
     *
     * @param \Date $fechaInformeGestion2
     * @return Cronograma
     */
    public function setFechaInformeGestion2($fechaInformeGestion2)
    {
        $this->fechaInformeGestion2 = $fechaInformeGestion2;
    
        return $this;
    }

    /**
     * Get fechaInformeGestion2
     *
     * @return \Date 
     */
    public function getFechaInformeGestion2()
    {
        return $this->fechaInformeGestion2;
    }

    /**
     * Set fechaInformeGestion3
     *
     * @param \Date $fechaInformeGestion3
     * @return Cronograma
     */
    public function setFechaInformeGestion3($fechaInformeGestion3)
    {
        $this->fechaInformeGestion3 = $fechaInformeGestion3;
    
        return $this;
    }

    /**
     * Get fechaInformeGestion3
     *
     * @return \Date 
     */
    public function getFechaInformeGestion3()
    {
        return $this->fechaInformeGestion3;
    }

    /**
     * Set fechaEvaluacionFinal
     *
     * @param \Date $fechaEvaluacionFinal
     * @return Cronograma
     */
    public function setFechaEvaluacionFinal($fechaEvaluacionFinal)
    {
        $this->fechaEvaluacionFinal = $fechaEvaluacionFinal;
    
        return $this;
    }

    /**
     * Get fechaEvaluacionFinal
     *
     * @return \Date 
     */
    public function getFechaEvaluacionFinal()
    {
        return $this->fechaEvaluacionFinal;
    }

    /**
     * Set listoAsesoria1
     *
     * @param boolean $listoAsesoria1
     * @return Cronograma
     */
    public function setListoAsesoria1($listoAsesoria1)
    {
        $this->listoAsesoria1 = $listoAsesoria1;
    
        return $this;
    }

    /**
     * Get listoAsesoria1
     *
     * @return boolean 
     */
    public function getListoAsesoria1()
    {
        return $this->listoAsesoria1;
    }

    /**
     * Set listoAsesoria2
     *
     * @param boolean $listoAsesoria2
     * @return Cronograma
     */
    public function setListoAsesoria2($listoAsesoria2)
    {
        $this->listoAsesoria2 = $listoAsesoria2;
    
        return $this;
    }

    /**
     * Get listoAsesoria2
     *
     * @return boolean 
     */
    public function getListoAsesoria2()
    {
        return $this->listoAsesoria2;
    }

    /**
     * Set listoAsesoria3
     *
     * @param boolean $listoAsesoria3
     * @return Cronograma
     */
    public function setListoAsesoria3($listoAsesoria3)
    {
        $this->listoAsesoria3 = $listoAsesoria3;
    
        return $this;
    }

    /**
     * Get listoAsesoria3
     *
     * @return boolean 
     */
    public function getListoAsesoria3()
    {
        return $this->listoAsesoria3;
    }

    /**
     * Set listoAsesoria4
     *
     * @param boolean $listoAsesoria4
     * @return Cronograma
     */
    public function setListoAsesoria4($listoAsesoria4)
    {
        $this->listoAsesoria4 = $listoAsesoria4;
    
        return $this;
    }

    /**
     * Get listoAsesoria4
     *
     * @return boolean 
     */
    public function getListoAsesoria4()
    {
        return $this->listoAsesoria4;
    }

    /**
     * Set listoAsesoria5
     *
     * @param boolean $listoAsesoria5
     * @return Cronograma
     */
    public function setListoAsesoria5($listoAsesoria5)
    {
        $this->listoAsesoria5 = $listoAsesoria5;
    
        return $this;
    }

    /**
     * Get listoAsesoria5
     *
     * @return boolean 
     */
    public function getListoAsesoria5()
    {
        return $this->listoAsesoria5;
    }

    /**
     * Set listoAsesoria6
     *
     * @param boolean $listoAsesoria6
     * @return Cronograma
     */
    public function setListoAsesoria6($listoAsesoria6)
    {
        $this->listoAsesoria6 = $listoAsesoria6;
    
        return $this;
    }

    /**
     * Get listoAsesoria6
     *
     * @return boolean 
     */
    public function getListoAsesoria6()
    {
        return $this->listoAsesoria6;
    }

    /**
     * Set listoAsesoria7
     *
     * @param boolean $listoAsesoria7
     * @return Cronograma
     */
    public function setListoAsesoria7($listoAsesoria7)
    {
        $this->listoAsesoria7 = $listoAsesoria7;
    
        return $this;
    }

    /**
     * Get listoAsesoria7
     *
     * @return boolean 
     */
    public function getListoAsesoria7()
    {
        return $this->listoAsesoria7;
    }

    /**
     * Set listoVisitaP
     *
     * @param boolean $listoVisitaP
     * @return Cronograma
     */
    public function setListoVisitaP($listoVisitaP)
    {
        $this->listoVisitaP = $listoVisitaP;
    
        return $this;
    }

    /**
     * Get listoVisitaP
     *
     * @return boolean 
     */
    public function getListoVisitaP()
    {
        return $this->listoVisitaP;
    }

    /**
     * Set listoEvaluacion1
     *
     * @param boolean $listoEvaluacion1
     * @return Cronograma
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
     * @return Cronograma
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
     * Set listoGestion1
     *
     * @param boolean $listoGestion1
     * @return Cronograma
     */
    public function setListoGestion1($listoGestion1)
    {
        $this->listoGestion1 = $listoGestion1;
    
        return $this;
    }

    /**
     * Get listoGestion1
     *
     * @return boolean 
     */
    public function getListoGestion1()
    {
        return $this->listoGestion1;
    }

    /**
     * Set listoGestion2
     *
     * @param boolean $listoGestion2
     * @return Cronograma
     */
    public function setListoGestion2($listoGestion2)
    {
        $this->listoGestion2 = $listoGestion2;
    
        return $this;
    }

    /**
     * Get listoGestion2
     *
     * @return boolean 
     */
    public function getListoGestion2()
    {
        return $this->listoGestion2;
    }

    /**
     * Set listoGestion3
     *
     * @param boolean $listoGestion3
     * @return Cronograma
     */
    public function setListoGestion3($listoGestion3)
    {
        $this->listoGestion3 = $listoGestion3;
    
        return $this;
    }

    /**
     * Get listoGestion3
     *
     * @return boolean 
     */
    public function getListoGestion3()
    {
        return $this->listoGestion3;
    }

    /**
     * Set listoEvaluacionFinal
     *
     * @param boolean $listoEvaluacionFinal
     * @return Cronograma
     */
    public function setListoEvaluacionFinal($listoEvaluacionFinal)
    {
        $this->listoEvaluacionFinal = $listoEvaluacionFinal;
    
        return $this;
    }

    /**
     * Get listoEvaluacionFinal
     *
     * @return boolean 
     */
    public function getListoEvaluacionFinal()
    {
        return $this->listoEvaluacionFinal;
    }

    /**
     * Set practicante
     *
     * @param integer $practicante
     * @return Cronograma
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
     * @return Cronograma
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
     * Set fechaAsesoria6
     *
     * @param \DateTime $fechaAsesoria6
     * @return Cronograma
     */
    public function setFechaAsesoria6($fechaAsesoria6)
    {
        $this->fechaAsesoria6 = $fechaAsesoria6;
    
        return $this;
    }

    /**
     * Get fechaAsesoria6
     *
     * @return \DateTime 
     */
    public function getFechaAsesoria6()
    {
        return $this->fechaAsesoria6;
    }
    /**
     * @var string
     */
    private $comentario;


    /**
     * Set comentario
     *
     * @param string $comentario
     * @return Cronograma
     */
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;
    
        return $this;
    }

    /**
     * Get comentario
     *
     * @return string 
     */
    public function getComentario()
    {
        return $this->comentario;
    }
	
	 /**
     * Set listoProyecto
     *
     * @param boolean $listoProyecto
     * @return Cronograma
     */
    public function setListoProyecto($listoProyecto)
    {
        $this->listoProyecto = $listoProyecto;
    
        return $this;
    }

    /**
     * Get listoProyecto
     *
     * @return boolean 
     */
    public function getListoProyecto()
    {
        return $this->listoProyecto;
    }
}