<?php

namespace Cituao\UsuarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Periodo
 */
class Periodo
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
	* @ORM\OneToMany(targetEntity="Cituao\CoordBundle\Practicante", mappedBy = "programa")	
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
     * Set nombre
     *
     * @param string $nombre
     * @return Periodo
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
     * @return Periodo
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