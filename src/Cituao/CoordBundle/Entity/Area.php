<?php

namespace Cituao\CoordBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Area
 * Cituao\CoordBundle\Entity\Area
 *
 * @ORM\Table(name="Area")
 * @ORM\Entity(repositoryClass="Cituao\CoordBundle\Entity\UserRepository")
 */
class Area
{
 	/**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

   /**
     * @var string $nombre
     *
     * @ORM\Column(name="area", type="string", length=50)
     */
    private $area;

    /**
	* @ORM\OneToMany(targetEntity="Cituao\CoordBundle\Practicante", mappedBy = "area")	
	**/
	protected $practicantes;


	public function __construct()
    {
        $this->practicantes = new ArrayCollection();
    }
	
	public function __toString()
	{
    	return strval($this->id);
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
     * Set area
     *
     * @param string $area
     * @return Area
     */
    public function setArea($area)
    {	
        $this->area = $area;
    
        return $this;
    }

    /**
     * Get area
     *
     * @return string 
     */
    public function getArea()
    {
        return $this->area;
    }
}