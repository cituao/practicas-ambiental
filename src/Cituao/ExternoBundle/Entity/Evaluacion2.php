<?php

namespace Cituao\ExternoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evaluacion2
 */
class Evaluacion2
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
    private $cumplido;

    /**
     * @var string
     */
    private $dl21;

    /**
     * @var string
     */
    private $dl22;

    /**
     * @var string
     */
    private $dl23;

    /**
     * @var string
     */
    private $dl24;

    /**
     * @var string
     */
    private $dl25;

    /**
     * @var string
     */
    private $dl26;

    /**
     * @var string
     */
    private $dl27;

    /**
     * @var string
     */
    private $dl28;

    /**
     * @var string
     */
    private $dl29;

    /**
     * @var string
     */
    private $va31;

    /**
     * @var string
     */
    private $va32;

    /**
     * @var string
     */
    private $va33;

    /**
     * @var string
     */
    private $va34;

    /**
     * @var string
     */
    private $va35;

    /**
     * @var string
     */
    private $va36;

    /**
     * @var string
     */
    private $va37;

    /**
     * @var string
     */
    private $va38;

    /**
     * @var string
     */
    private $va39;

    /**
     * @var string
     */
    private $comentarioExterno;

    /**
     * @var string
     */
    private $aportes;

    /**
     * @var string
     */
    private $proyeccion;

    /**
     * @var string
     */
    private $compromiso;

    /**
     * @var string
     */
    private $apreciacion;

    /**
     * @var boolean
     */
    private $aprobado;

    /**
     * @var string
     */
    private $comentarioAcademico;


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
     * @return Evaluacion2
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
     * @return Evaluacion2
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
     * Set cumplido
     *
     * @param string $cumplido
     * @return Evaluacion2
     */
    public function setCumplido($cumplido)
    {
        $this->cumplido = $cumplido;
    
        return $this;
    }

    /**
     * Get cumplido
     *
     * @return string 
     */
    public function getCumplido()
    {
        return $this->cumplido;
    }

    /**
     * Set dl21
     *
     * @param string $dl21
     * @return Evaluacion2
     */
    public function setDl21($dl21)
    {
        $this->dl21 = $dl21;
    
        return $this;
    }

    /**
     * Get dl21
     *
     * @return string 
     */
    public function getDl21()
    {
        return $this->dl21;
    }

    /**
     * Set dl22
     *
     * @param string $dl22
     * @return Evaluacion2
     */
    public function setDl22($dl22)
    {
        $this->dl22 = $dl22;
    
        return $this;
    }

    /**
     * Get dl22
     *
     * @return string 
     */
    public function getDl22()
    {
        return $this->dl22;
    }

    /**
     * Set dl23
     *
     * @param string $dl23
     * @return Evaluacion2
     */
    public function setDl23($dl23)
    {
        $this->dl23 = $dl23;
    
        return $this;
    }

    /**
     * Get dl23
     *
     * @return string 
     */
    public function getDl23()
    {
        return $this->dl23;
    }

    /**
     * Set dl24
     *
     * @param string $dl24
     * @return Evaluacion2
     */
    public function setDl24($dl24)
    {
        $this->dl24 = $dl24;
    
        return $this;
    }

    /**
     * Get dl24
     *
     * @return string 
     */
    public function getDl24()
    {
        return $this->dl24;
    }

    /**
     * Set dl25
     *
     * @param string $dl25
     * @return Evaluacion2
     */
    public function setDl25($dl25)
    {
        $this->dl25 = $dl25;
    
        return $this;
    }

    /**
     * Get dl25
     *
     * @return string 
     */
    public function getDl25()
    {
        return $this->dl25;
    }

    /**
     * Set dl26
     *
     * @param string $dl26
     * @return Evaluacion2
     */
    public function setDl26($dl26)
    {
        $this->dl26 = $dl26;
    
        return $this;
    }

    /**
     * Get dl26
     *
     * @return string 
     */
    public function getDl26()
    {
        return $this->dl26;
    }

    /**
     * Set dl27
     *
     * @param string $dl27
     * @return Evaluacion2
     */
    public function setDl27($dl27)
    {
        $this->dl27 = $dl27;
    
        return $this;
    }

    /**
     * Get dl27
     *
     * @return string 
     */
    public function getDl27()
    {
        return $this->dl27;
    }

    /**
     * Set dl28
     *
     * @param string $dl28
     * @return Evaluacion2
     */
    public function setDl28($dl28)
    {
        $this->dl28 = $dl28;
    
        return $this;
    }

    /**
     * Get dl28
     *
     * @return string 
     */
    public function getDl28()
    {
        return $this->dl28;
    }

    /**
     * Set dl29
     *
     * @param string $dl29
     * @return Evaluacion2
     */
    public function setDl29($dl29)
    {
        $this->dl29 = $dl29;
    
        return $this;
    }

    /**
     * Get dl29
     *
     * @return string 
     */
    public function getDl29()
    {
        return $this->dl29;
    }

    /**
     * Set va31
     *
     * @param string $va31
     * @return Evaluacion2
     */
    public function setVa31($va31)
    {
        $this->va31 = $va31;
    
        return $this;
    }

    /**
     * Get va31
     *
     * @return string 
     */
    public function getVa31()
    {
        return $this->va31;
    }

    /**
     * Set va32
     *
     * @param string $va32
     * @return Evaluacion2
     */
    public function setVa32($va32)
    {
        $this->va32 = $va32;
    
        return $this;
    }

    /**
     * Get va32
     *
     * @return string 
     */
    public function getVa32()
    {
        return $this->va32;
    }

    /**
     * Set va33
     *
     * @param string $va33
     * @return Evaluacion2
     */
    public function setVa33($va33)
    {
        $this->va33 = $va33;
    
        return $this;
    }

    /**
     * Get va33
     *
     * @return string 
     */
    public function getVa33()
    {
        return $this->va33;
    }

    /**
     * Set va34
     *
     * @param string $va34
     * @return Evaluacion2
     */
    public function setVa34($va34)
    {
        $this->va34 = $va34;
    
        return $this;
    }

    /**
     * Get va34
     *
     * @return string 
     */
    public function getVa34()
    {
        return $this->va34;
    }

    /**
     * Set va35
     *
     * @param string $va35
     * @return Evaluacion2
     */
    public function setVa35($va35)
    {
        $this->va35 = $va35;
    
        return $this;
    }

    /**
     * Get va35
     *
     * @return string 
     */
    public function getVa35()
    {
        return $this->va35;
    }

    /**
     * Set va36
     *
     * @param string $va36
     * @return Evaluacion2
     */
    public function setVa36($va36)
    {
        $this->va36 = $va36;
    
        return $this;
    }

    /**
     * Get va36
     *
     * @return string 
     */
    public function getVa36()
    {
        return $this->va36;
    }

    /**
     * Set va37
     *
     * @param string $va37
     * @return Evaluacion2
     */
    public function setVa37($va37)
    {
        $this->va37 = $va37;
    
        return $this;
    }

    /**
     * Get va37
     *
     * @return string 
     */
    public function getVa37()
    {
        return $this->va37;
    }

    /**
     * Set va38
     *
     * @param string $va38
     * @return Evaluacion2
     */
    public function setVa38($va38)
    {
        $this->va38 = $va38;
    
        return $this;
    }

    /**
     * Get va38
     *
     * @return string 
     */
    public function getVa38()
    {
        return $this->va38;
    }

    /**
     * Set va39
     *
     * @param string $va39
     * @return Evaluacion2
     */
    public function setVa39($va39)
    {
        $this->va39 = $va39;
    
        return $this;
    }

    /**
     * Get va39
     *
     * @return string 
     */
    public function getVa39()
    {
        return $this->va39;
    }

    /**
     * Set comentarioExterno
     *
     * @param string $comentarioExterno
     * @return Evaluacion2
     */
    public function setComentarioExterno($comentarioExterno)
    {
        $this->comentarioExterno = $comentarioExterno;
    
        return $this;
    }

    /**
     * Get comentarioExterno
     *
     * @return string 
     */
    public function getComentarioExterno()
    {
        return $this->comentarioExterno;
    }

    /**
     * Set aportes
     *
     * @param string $aportes
     * @return Evaluacion2
     */
    public function setAportes($aportes)
    {
        $this->aportes = $aportes;
    
        return $this;
    }

    /**
     * Get aportes
     *
     * @return string 
     */
    public function getAportes()
    {
        return $this->aportes;
    }

    /**
     * Set proyeccion
     *
     * @param string $proyeccion
     * @return Evaluacion2
     */
    public function setProyeccion($proyeccion)
    {
        $this->proyeccion = $proyeccion;
    
        return $this;
    }

    /**
     * Get proyeccion
     *
     * @return string 
     */
    public function getProyeccion()
    {
        return $this->proyeccion;
    }

    /**
     * Set compromiso
     *
     * @param string $compromiso
     * @return Evaluacion2
     */
    public function setCompromiso($compromiso)
    {
        $this->compromiso = $compromiso;
    
        return $this;
    }

    /**
     * Get compromiso
     *
     * @return string 
     */
    public function getCompromiso()
    {
        return $this->compromiso;
    }

    /**
     * Set apreciacion
     *
     * @param string $apreciacion
     * @return Evaluacion2
     */
    public function setApreciacion($apreciacion)
    {
        $this->apreciacion = $apreciacion;
    
        return $this;
    }

    /**
     * Get apreciacion
     *
     * @return string 
     */
    public function getApreciacion()
    {
        return $this->apreciacion;
    }

    /**
     * Set aprobado
     *
     * @param boolean $aprobado
     * @return Evaluacion2
     */
    public function setAprobado($aprobado)
    {
        $this->aprobado = $aprobado;
    
        return $this;
    }

    /**
     * Get aprobado
     *
     * @return boolean 
     */
    public function getAprobado()
    {
        return $this->aprobado;
    }

    /**
     * Set comentarioAcademico
     *
     * @param string $comentarioAcademico
     * @return Evaluacion2
     */
    public function setComentarioAcademico($comentarioAcademico)
    {
        $this->comentarioAcademico = $comentarioAcademico;
    
        return $this;
    }

    /**
     * Get comentarioAcademico
     *
     * @return string 
     */
    public function getComentarioAcademico()
    {
        return $this->comentarioAcademico;
    }
    /**
     * @var string
     */
    private $compromisop;


    /**
     * Set compromisop
     *
     * @param string $compromisop
     * @return Evaluacion2
     */
    public function setCompromisop($compromisop)
    {
        $this->compromisop = $compromisop;
    
        return $this;
    }

    /**
     * Get compromisop
     *
     * @return string 
     */
    public function getCompromisop()
    {
        return $this->compromisop;
    }
}