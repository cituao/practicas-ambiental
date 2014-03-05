<?php

namespace Cituao\AcademicoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;


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
	 * @Assert\NotBlank(message="El nombre es necesario!")
     */
    private $nombres;

     /**
     * @ORM\Column(type="string", length=50)
	 * @Assert\NotBlank(message="El apellido es necesario")
     */
    private $apellidos;

     /**
     * @ORM\Column(type="string", length=12, unique=true)
	 * @Assert\NotBlank(message="La cédula es necesario")
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
    private $path;

    /**
     * @ORM\Column(type="text", length=500)
     */
    private $perfil;

	/**
     * @Assert\File(maxSize="6000000")
     */
    private $file;	
	
    /**
	* @ORM\OneToMany(targetEntity="Cituao\CoordBundle\Practicante", mappedBy = "academico")	
	**/
	protected $practicantes;

public function __construct()
    {
        
		$this->practicantes = new ArrayCollection();
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

    /**
     * Set perfil
     *
     * @param string $perfil
     * @return Academico
     */
    public function setPerfil($perfil)
    {
        $this->perfil = $perfil;
    
        return;
    }

    /**
     * Get perfil
     *
     * @return string 
     */
    public function getPerfil()
    {
        return $this->perfil;
    }

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }	
	
	
	
    /**
     * Set path
     *
     * @param string $path
     * @return Document
     */
    public function setPath($path)
    {
        $this->path = $path;
    
        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }



public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/fotos';
    }


	public function upload()
	{
	 // the file property can be empty if the field is not required
		if (null === $this->getFile()) {
		    return;
		}

		// use the original file name here but you should
		// sanitize it at least to avoid any security issues

		// move takes the target directory and then the
		// target filename to move to
		
		//asignamos el codigo uao a la foto
		$nombre = $this->codigo.'.png'; 
		$this->getFile()->move(
		    $this->getUploadRootDir(),
		    $nombre
		);
		//$this->getFile()->getClientOriginalName()
		
		
		
		// set the path property to the filename where you've saved the file
		//$this->path = $this->getFile()->getClientOriginalName();
		$this->path = $nombre;
		// clean up the file property as you won't need it anymore
		$this->file = null;	
	}
	
}
