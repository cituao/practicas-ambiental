<?php

namespace Cituao\AcademicoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Cituao\AcademicoBundle\Entity\Academico
 *
 * @ORM\Table(name="Academico")
 * @ORM\Entity(repositoryClass="Cituao\AcademicoBundle\Entity\ExternoRepository")
 */
class Academico
{

	 /**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
    private $id;

     /**
     * @ORM\Column(type="string", length=50)
     */
    private $nombres;

     /**
     * @ORM\Column(type="string", length=50)
     */
    private $apellidos;

     /**
     * @ORM\Column(type="string", length=12, unique=true)
     */
    private $ci;

     /**
     * @ORM\Column(type="string", length=15)
     */
    private $telefonoMovil;

     /**
     * @ORM\Column(type="string", length=15)
     */
    private $telefonoFijo;

     /**
     * @ORM\Column(type="string", length=50)
     */
    private $email;

    /**
	* @ORM\OneToMany(targetEntity="Cituao\CoordBundle\Practicante", mappedBy = "academico")	
	**/
	protected $practicantes;


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
     * Set nombres
     *
     * @param string $nombres
     * @return Academico
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
     * Set apellidos
     *
     * @param string $apellidos
     * @return Academico
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
     * Set ci
     *
     * @param string $ci
     * @return Academico
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
     * Set telefonoMovil
     *
     * @param string $telefonoMovil
     * @return Academico
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
     * Set telefonoFijo
     *
     * @param string $telefonoFijo
     * @return Academico
     */
    public function setTelefonoFijo($telefonoFijo)
    {
        $this->telefonoFijo = $telefonoFijo;
    
        return $this;
    }

    /**
     * Get telefonoFijo
     *
     * @return string 
     */
    public function getTelefonoFijo()
    {
        return $this->telefonoFijo;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Academico
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }
}
