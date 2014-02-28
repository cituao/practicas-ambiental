<?php

namespace Cituao\ExternoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Cituao\ExternoBundle\Entity\Externo
 *
 * @ORM\Table(name="Externo")
 * @ORM\Entity(repositoryClass="Cituao\ExternoBundle\Entity\ExternoRepository")
 */
class Externo
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
     * @ORM\Column(type="string", length=30)
     */
    private $cargo;

     /**
     * @ORM\ManyToOne(targetEntity="Cituao\CoordBundle\Centro", inversedBy="externos")
	 * JoinColumn(name="centro", referencedColumnName="id")
     */
    private $centro;

    /**
	* @ORM\OneToMany(targetEntity="Cituao\CoordBundle\Practicante", mappedBy = "externo")	
	**/
	protected $practicantes;


	public function __construct()
    {
        $this->practicantes = new ArrayCollection();
    }
	

	public function __toString(){

		return sprintf('%s %s',$this->nombres, $this->apellidos);

	}
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
     * @return Externo
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
    
        return;
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
     * @return Externo
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    
        return;
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
	 *
	 * nombre completo para los select 
	 */
	public function getNombreCompleto(){

		return sprintf('%s %s',$this->nombres, $this->apellidos);
	}

    /**
     * Set ci
     *
     * @param string $ci
     * @return Externo
     */
    public function setCi($ci)
    {
        $this->ci = $ci;
    
        return;
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
     * @return Externo
     */
    public function setTelefonoMovil($telefonoMovil)
    {
        $this->telefonoMovil = $telefonoMovil;
    
        return;
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
     * @return Externo
     */
    public function setTelefonoFijo($telefonoFijo)
    {
        $this->telefonoFijo = $telefonoFijo;
    
        return;
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
     * @return Externo
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return;
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

    /**
     * Set centro
     *
     * @param string $centro
     * @return Externo
     */
    public function setCentro($centro)
    {
        $this->centro = $centro;
    
        return;
    }

    /**
     * Get centro
     *
     * @return string 
     */
    public function getCentro()
    {
        return $this->centro;
    }

    /**
     * Set cargo
     *
     * @param string $cargo
     * @return Externo
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
    
        return;
    }

    /**
     * Get cargo
     *
     * @return string 
     */
    public function getCargo()
    {
        return $this->cargo;
    }

}
