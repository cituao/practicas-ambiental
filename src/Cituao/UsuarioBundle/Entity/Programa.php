<?php

namespace Cituao\UsuarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Annotations;

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
	* @ORM\OneToMany(targetEntity="Cituao\CoordBundle\Centro", mappedBy = "programa")	
	**/
	protected $centros;
	
	/**
	* @ORM\OneToMany(targetEntity="Cituao\ExternoBundle\Externo", mappedBy = "programa")
	**/
	protected $externos;

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
		$this->academicos = new \Doctrine\Common\Collections\ArrayCollection();
		
		
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

    /**
     * Add academicos
     *
     * @param \Cituao\AcademicoBundle\Entity\Academico $academicos
     * @return Programa
     */
    public function addAcademico(\Cituao\AcademicoBundle\Entity\Academico $academicos)
    {
        $this->academicos[] = $academicos;
    
        return $this;
    }

    /**
     * Remove academicos
     *
     * @param \Cituao\AcademicoBundle\Entity\Academico $academicos
     */
    public function removeAcademico(\Cituao\AcademicoBundle\Entity\Academico $academicos)
    {
        $this->academicos->removeElement($academicos);
    }

    /**
     * Get academicos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAcademicos()
    {
        return $this->academicos;
    }

    /**
     * Add centros
     *
     * @param \Cituao\CoordBundle\Entity\Centro $centros
     * @return Programa
     */
    public function addCentro(\Cituao\CoordBundle\Entity\Centro $centros)
    {
        $this->centros[] = $centros;
    
        return $this;
    }

    /**
     * Remove centros
     *
     * @param \Cituao\CoordBundle\Entity\Centro $centros
     */
    public function removeCentro(\Cituao\CoordBundle\Entity\Centro $centros)
    {
        $this->centros->removeElement($centros);
    }

    /**
     * Get centros
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCentros()
    {
        return $this->centros;
    }

    /**
     * Add externos
     *
     * @param \Cituao\ExternoBundle\Entity\Externo $externos
     * @return Programa
     */
    public function addExterno(\Cituao\ExternoBundle\Entity\Externo $externos)
    {
        $this->externos[] = $externos;
    
        return $this;
    }

    /**
     * Remove externos
     *
     * @param \Cituao\ExternoBundle\Entity\Externo $externos
     */
    public function removeExterno(\Cituao\ExternoBundle\Entity\Externo $externos)
    {
        $this->externos->removeElement($externos);
    }

    /**
     * Get externos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getExternos()
    {
        return $this->externos;
    }
}