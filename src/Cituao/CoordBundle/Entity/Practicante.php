<?php

namespace Cituao\CoordBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Practicante
 */

/**
 * Cituao\CoordBundle\Entity\Practicante
 *
 * @ORM\Table(name="Practicante")
 * @ORM\Entity(repositoryClass="Cituao\CoordBundle\Entity\UserRepository")
 */
class Practicante
{

     /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

     /**
     * @ORM\Column(type="string", length=12, unique=true)
     */
    private $codigo;


     /**
     * @ORM\Column(type="string", length=50)
     */
   private $apellidos;

     /**
     * @ORM\Column(type="string", length=50)
     */
    private $nombres;

     /**
     * @ORM\Column(type="string", length=12, unique=true)
     */
    private $ci;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechaMatriculacion;

     /**
     * @ORM\Column(type="string", length=50)
     */
    private $emailInstitucional;

     /**
     * @ORM\Column(type="string", length=50)
     */
    private $emailPersonal;

     /**
     * @ORM\Column(type="string", length=15)
     */
    private $telefonoMovil;

     /**
     * @ORM\Column(type="string", length=3)
     */
    private $modalidad;

     /**
     * @ORM\Column(type="string", length=3)
     */
    private $tipo;

     /**
     * @ORM\Column(type="string", length=2)
     */
    private $estado;

     /**
     * @ORM\Column(type="blob")
     */
    private $foto;

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
     * Set codigo
     *
     * @param string $codigo
     * @return Practicante
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    
        return $this;
    }

    /**
     * Get codigo
     *
     * @return string 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     * @return Practicante
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    
        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string 
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set nombres
     *
     * @param string $nombres
     * @return Practicante
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
    
        return $this;
    }

    /**
     * Get nombres
     *
     * @return string 
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * Set ci
     *
     * @param string $ci
     * @return Practicante
     */
    public function setCi($ci)
    {
        $this->ci = $ci;
    
        return $this;
    }

    /**
     * Get ci
     *
     * @return string 
     */
    public function getCi()
    {
        return $this->ci;
    }

    /**
     * Set fechaMatriculacion
     *
     * @param \DateTime $fechaMatriculacion
     * @return Practicante
     */
    public function setFechaMatriculacion($fechaMatriculacion)
    {
        $this->fechaMatriculacion = $fechaMatriculacion;
    
        return $this;
    }

    /**
     * Get fechaMatriculacion
     *
     * @return \DateTime 
     */
    public function getFechaMatriculacion()
    {
        return $this->fechaMatriculacion;
    }

    /**
     * Set emailInstitucional
     *
     * @param string $emailInstitucional
     * @return Practicante
     */
    public function setEmailInstitucional($emailInstitucional)
    {
        $this->emailInstitucional = $emailInstitucional;
    
        return $this;
    }

    /**
     * Get emailInstitucional
     *
     * @return string 
     */
    public function getEmailInstitucional()
    {
        return $this->emailInstitucional;
    }

    /**
     * Set emailPersonal
     *
     * @param string $emailPersonal
     * @return Practicante
     */
    public function setEmailPersonal($emailPersonal)
    {
        $this->emailPersonal = $emailPersonal;
    
        return $this;
    }

    /**
     * Get emailPersonal
     *
     * @return string 
     */
    public function getEmailPersonal()
    {
        return $this->emailPersonal;
    }

    /**
     * Set telefonoMovil
     *
     * @param string $telefonoMovil
     * @return Practicante
     */
    public function setTelefonoMovil($telefonoMovil)
    {
        $this->telefonoMovil = $telefonoMovil;
    
        return $this;
    }

    /**
     * Get telefonoMovil
     *
     * @return string 
     */
    public function getTelefonoMovil()
    {
        return $this->telefonoMovil;
    }

    /**
     * Set modalidad
     *
     * @param string $modalidad
     * @return Practicante
     */
    public function setModalidad($modalidad)
    {
        $this->modalidad = $modalidad;
    
        return $this;
    }

    /**
     * Get modalidad
     *
     * @return string 
     */
    public function getModalidad()
    {
        return $this->modalidad;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return Practicante
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    
        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return Practicante
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set foto
     *
     * @param string $foto
     * @return Practicante
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;
    
        return $this;
    }

    /**
     * Get foto
     *
     * @return string 
     */
    public function getFoto()
    {
        return $this->foto;
    }
}
