<?php

namespace Cituao\UsuarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Programa
 */
class Programa
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $coordinador;

    /**
     * @var string
     */
    private $email;

	/**
	* @ORM\OneToMany(targetEntity="Cituao\CoordBundle\Practicante", mappedBy = "programa")	
	**/
	protected $practicantes;

	/**
	* @ORM\OneToMany(targetEntity="Cituao\AcademicoBundle\Academico", mappedBy = "programa")	
	**/
	protected $academicos;

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
     * Set nombre
     *
     * @param string $nombre
     * @return Programa
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set coordinador
     *
     * @param string $coordinador
     * @return Programa
     */
    public function setCoordinador($coordinador)
    {
        $this->coordinador = $coordinador;
    
        return $this;
    }

    /**
     * Get coordinador
     *
     * @return string 
     */
    public function getCoordinador()
    {
        return $this->coordinador;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Programa
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->practicantes = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add practicantes
     *
     * @param \Cituao\CoordBundle\Entity\Practicante $practicantes
     * @return Programa
     */
    public function addPracticante(\Cituao\CoordBundle\Entity\Practicante $practicantes)
    {
        $this->practicantes[] = $practicantes;
    
        return $this;
    }

    /**
     * Remove practicantes
     *
     * @param \Cituao\CoordBundle\Entity\Practicante $practicantes
     */
    public function removePracticante(\Cituao\CoordBundle\Entity\Practicante $practicantes)
    {
        $this->practicantes->removeElement($practicantes);
    }

    /**
     * Get practicantes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPracticantes()
    {
        return $this->practicantes;
    }
}
