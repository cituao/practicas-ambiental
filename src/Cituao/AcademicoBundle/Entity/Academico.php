<?php

namespace Cituao\AcademicoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Filesystem\Filesystem;

/**
 * Cituao\AcademicoBundle\Entity\Academico
 *
 * @ORM\Table(name="Academico")
 * @ORM\Entity(repositoryClass="Cituao\AcademicoBundle\Entity\AcademicoRepository")
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
	* @ORM\Column(type="string", length=1)
	*/
	private $categoria;
	
	/**
	* @ORM\Column(type="boolean")
	*/
	private $declaracion;

    /**
     * @ORM\Column(type="date")
	 * @Assert\Date()(message="Este dato es obligatorio")
     */
    private $fechaAsesoria1;

    /**
     * @ORM\Column(type="date")
	 * @Assert\Date()(message="Este dato es obligatorio")
     */
    private $fechaAsesoria2;

    /**
     * @ORM\Column(type="date")
	 * @Assert\Date()(message="Este dato es obligatorio")
     */
    private $fechaAsesoria3;

    /**
     * @ORM\Column(type="date")
	 * @Assert\Date()(message="Este dato es obligatorio")
     */
    private $fechaAsesoria4;

    /**
     * @ORM\Column(type="date")
	 * @Assert\Date()(message="Este dato es obligatorio")
     */
    private $fechaAsesoria5;

    /**
     * @ORM\Column(type="date")
	 * @Assert\Date()(message="Este dato es obligatorio")
     */
    private $fechaAsesoria6;

    /**
     * @ORM\Column(type="date")
	 * @Assert\Date()(message="Este dato es obligatorio")
     */
    private $fechaAsesoria7;

    /**
     * @ORM\Column(type="date")
	 * @Assert\Date()(message="Este dato es obligatorio")
     */
    private $fechaVisitaP;

    /**
     * @ORM\Column(type="date")
	 * @Assert\Date()(message="Este dato es obligatorio")
     */
    private $fechaVisita1;

    /**
     * @ORM\Column(type="date")
	 * @Assert\Date()(message="Este dato es obligatorio")
     */
    private $fechaVisita2;

    /**
     * @ORM\Column(type="date")
	 * @Assert\Date()(message="Este dato es obligatorio")
     */
    private $fechaInformeGestion1;

    /**
     * @ORM\Column(type="date")
	 * @Assert\Date()(message="Este dato es obligatorio")
     */
    private $fechaInformeGestion2;

    /**
     * @ORM\Column(type="date")
	 * @Assert\Date()(message="Este dato es obligatorio")
     */
    private $fechaInformeGestion3;

    /**
     * @ORM\Column(type="date")
	 * @Assert\Date()(message="Este dato es obligatorio")
     */
    private $fechaEvaluacionFinal;

    /**
     * @ORM\Column(type="boolean")
     */
    private $listoAsesoria1;

    /**
     * @ORM\Column(type="boolean")
     */
    private $listoAsesoria2;

    /**
     * @ORM\Column(type="boolean")
     */
    private $listoAsesoria3;

    /**
     * @ORM\Column(type="boolean")
     */
    private $listoAsesoria4;

    /**
     * @ORM\Column(type="boolean")
     */
    private $listoAsesoria5;

    /**
     * @ORM\Column(type="boolean")
     */
    private $listoAsesoria6;

    /**
     * @ORM\Column(type="boolean")
     */
    private $listoAsesoria7;

    /**
     * @ORM\Column(type="boolean")
    */
    private $listoVisitaP;

    /**
     * @ORM\Column(type="boolean")
    */
    private $listoVisita1;

    /**
     * @ORM\Column(type="boolean")
    */
    private $listoVisita2;

    /**
     * @ORM\Column(type="boolean")
    */
    private $listoInformeGestion1;

    /**
     * @ORM\Column(type="boolean")
    */
    private $listoInformeGestion2;

    /**
     * @ORM\Column(type="boolean")
    */
    private $listoInformeGestion3;

    /**
     * @ORM\Column(type="boolean")
    */
    private $listoEvaluacionFinal;

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
     * Set categoria
     *
     * @param string $categoria
     * @return Academico
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    
        return;
    }

    /**
     * Get declaracion
     *
     * @return boolean 
     */
    public function getDeclaracion()
    {
        return $this->declaracion;
    }	
	
    /**
     * Set declaracion
     *
     * @param boolean $declaracion
     * @return Academico
     */
    public function setDeclaracion($declaracion)
    {
        $this->declaracion = $declaracion;
    
        return;
    }

    /**
     * Get categoria
     *
     * @return string 
     */
    public function getCategoria()
    {
        return $this->categoria;
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
		
		/*if ($this->getPath() == $this->ci.'.png'){
			$fs = new Filesystem();
			$fs->remove($this->getUploadRootDir().'/'.$this->ci.'.png');
		} */	
		
		//asignamos la ci a la foto
		$nombre = $this->ci.'.png'; 
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
	

    /**
     * Add practicantes
     *
     * @param \Cituao\CoordBundle\Entity\Practicante $practicantes
     * @return Academico
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
     * Set fechaAsesoria1
     *
     * @param \DateTime $fechaAsesoria1
     * @return Academico
     */
    public function setFechaAsesoria1($fechaAsesoria1)
    {
        $this->fechaAsesoria1 = $fechaAsesoria1;
    
        return $this;
    }

    /**
     * Get fechaAsesoria1
     *
     * @return \DateTime 
     */
    public function getFechaAsesoria1()
    {
        return $this->fechaAsesoria1;
    }

    /**
     * Set fechaAsesoria2
     *
     * @param \DateTime $fechaAsesoria2
     * @return Academico
     */
    public function setFechaAsesoria2($fechaAsesoria2)
    {
        $this->fechaAsesoria2 = $fechaAsesoria2;
    
        return $this;
    }

    /**
     * Get fechaAsesoria2
     *
     * @return \DateTime 
     */
    public function getFechaAsesoria2()
    {
        return $this->fechaAsesoria2;
    }

    /**
     * Set fechaAsesoria3
     *
     * @param \DateTime $fechaAsesoria3
     * @return Academico
     */
    public function setFechaAsesoria3($fechaAsesoria3)
    {
        $this->fechaAsesoria3 = $fechaAsesoria3;
    
        return $this;
    }

    /**
     * Get fechaAsesoria3
     *
     * @return \DateTime 
     */
    public function getFechaAsesoria3()
    {
        return $this->fechaAsesoria3;
    }

    /**
     * Set fechaAsesoria4
     *
     * @param \DateTime $fechaAsesoria4
     * @return Academico
     */
    public function setFechaAsesoria4($fechaAsesoria4)
    {
        $this->fechaAsesoria4 = $fechaAsesoria4;
    
        return $this;
    }

    /**
     * Get fechaAsesoria4
     *
     * @return \DateTime 
     */
    public function getFechaAsesoria4()
    {
        return $this->fechaAsesoria4;
    }

    /**
     * Set fechaAsesoria5
     *
     * @param \DateTime $fechaAsesoria5
     * @return Academico
     */
    public function setFechaAsesoria5($fechaAsesoria5)
    {
        $this->fechaAsesoria5 = $fechaAsesoria5;
    
        return $this;
    }

    /**
     * Get fechaAsesoria5
     *
     * @return \DateTime 
     */
    public function getFechaAsesoria5()
    {
        return $this->fechaAsesoria5;
    }

    /**
     * Set fechaAsesoria6
     *
     * @param \DateTime $fechaAsesoria6
     * @return Academico
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
     * Set fechaAsesoria7
     *
     * @param \DateTime $fechaAsesoria7
     * @return Academico
     */
    public function setFechaAsesoria7($fechaAsesoria7)
    {
        $this->fechaAsesoria7 = $fechaAsesoria7;
    
        return $this;
    }

    /**
     * Get fechaAsesoria7
     *
     * @return \DateTime 
     */
    public function getFechaAsesoria7()
    {
        return $this->fechaAsesoria7;
    }

    /**
     * Set fechaVisitaP
     *
     * @param \DateTime $fechaVisitaP
     * @return Academico
     */
    public function setFechaVisitaP($fechaVisitaP)
    {
        $this->fechaVisitaP = $fechaVisitaP;
    
        return $this;
    }

    /**
     * Get fechaVisitaP
     *
     * @return \DateTime 
     */
    public function getFechaVisitaP()
    {
        return $this->fechaVisitaP;
    }

    /**
     * Set fechaVisita1
     *
     * @param \DateTime $fechaVisita1
     * @return Academico
     */
    public function setFechaVisita1($fechaVisita1)
    {
        $this->fechaVisita1 = $fechaVisita1;
    
        return $this;
    }

    /**
     * Get fechaVisita1
     *
     * @return \DateTime 
     */
    public function getFechaVisita1()
    {
        return $this->fechaVisita1;
    }

    /**
     * Set fechaVisita2
     *
     * @param \DateTime $fechaVisita2
     * @return Academico
     */
    public function setFechaVisita2($fechaVisita2)
    {
        $this->fechaVisita2 = $fechaVisita2;
    
        return $this;
    }

    /**
     * Get fechaVisita2
     *
     * @return \DateTime 
     */
    public function getFechaVisita2()
    {
        return $this->fechaVisita2;
    }

    /**
     * Set fechaInformeGestion1
     *
     * @param \DateTime $fechaInformeGestion1
     * @return Academico
     */
    public function setFechaInformeGestion1($fechaInformeGestion1)
    {
        $this->fechaInformeGestion1 = $fechaInformeGestion1;
    
        return $this;
    }

    /**
     * Get fechaInformeGestion1
     *
     * @return \DateTime 
     */
    public function getFechaInformeGestion1()
    {
        return $this->fechaInformeGestion1;
    }

    /**
     * Set fechaInformeGestion2
     *
     * @param \DateTime $fechaInformeGestion2
     * @return Academico
     */
    public function setFechaInformeGestion2($fechaInformeGestion2)
    {
        $this->fechaInformeGestion2 = $fechaInformeGestion2;
    
        return $this;
    }

    /**
     * Get fechaInformeGestion2
     *
     * @return \DateTime 
     */
    public function getFechaInformeGestion2()
    {
        return $this->fechaInformeGestion2;
    }

    /**
     * Set fechaInformeGestion3
     *
     * @param \DateTime $fechaInformeGestion3
     * @return Academico
     */
    public function setFechaInformeGestion3($fechaInformeGestion3)
    {
        $this->fechaInformeGestion3 = $fechaInformeGestion3;
    
        return $this;
    }

    /**
     * Get fechaInformeGestion3
     *
     * @return \DateTime 
     */
    public function getFechaInformeGestion3()
    {
        return $this->fechaInformeGestion3;
    }

    /**
     * Set fechaEvaluacionFinal
     *
     * @param \DateTime $fechaEvaluacionFinal
     * @return Academico
     */
    public function setFechaEvaluacionFinal($fechaEvaluacionFinal)
    {
        $this->fechaEvaluacionFinal = $fechaEvaluacionFinal;
    
        return $this;
    }

    /**
     * Get fechaEvaluacionFinal
     *
     * @return \DateTime 
     */
    public function getFechaEvaluacionFinal()
    {
        return $this->fechaEvaluacionFinal;
    }

    /**
     * Set listoAsesoria1
     *
     * @param boolean $listoAsesoria1
     * @return Academico
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
     * @return Academico
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
     * @return Academico
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
     * @return Academico
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
     * @return Academico
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
     * @return Academico
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
     * @return Academico
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
     * @return Academico
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
     * Set listoVisita1
     *
     * @param boolean $listoVisita1
     * @return Academico
     */
    public function setListoVisita1($listoVisita1)
    {
        $this->listoVisita1 = $listoVisita1;
    
        return $this;
    }

    /**
     * Get listoVisita1
     *
     * @return boolean 
     */
    public function getListoVisita1()
    {
        return $this->listoVisita1;
    }

    /**
     * Set listoVisita2
     *
     * @param boolean $listoVisita2
     * @return Academico
     */
    public function setListoVisita2($listoVisita2)
    {
        $this->listoVisita2 = $listoVisita2;
    
        return $this;
    }

    /**
     * Get listoVisita2
     *
     * @return boolean 
     */
    public function getListoVisita2()
    {
        return $this->listoVisita2;
    }

    /**
     * Set listoInformeGestion1
     *
     * @param boolean $listoInformeGestion1
     * @return Academico
     */
    public function setListoInformeGestion1($listoInformeGestion1)
    {
        $this->listoInformeGestion1 = $listoInformeGestion1;
    
        return $this;
    }

    /**
     * Get listoInformeGestion1
     *
     * @return boolean 
     */
    public function getListoInformeGestion1()
    {
        return $this->listoInformeGestion1;
    }

    /**
     * Set listoInformeGestion2
     *
     * @param boolean $listoInformeGestion2
     * @return Academico
     */
    public function setListoInformeGestion2($listoInformeGestion2)
    {
        $this->listoInformeGestion2 = $listoInformeGestion2;
    
        return $this;
    }

    /**
     * Get listoInformeGestion2
     *
     * @return boolean 
     */
    public function getListoInformeGestion2()
    {
        return $this->listoInformeGestion2;
    }

    /**
     * Set listoInformeGestion3
     *
     * @param boolean $listoInformeGestion3
     * @return Academico
     */
    public function setListoInformeGestion3($listoInformeGestion3)
    {
        $this->listoInformeGestion3 = $listoInformeGestion3;
    
        return $this;
    }

    /**
     * Get listoInformeGestion3
     *
     * @return boolean 
     */
    public function getListoInformeGestion3()
    {
        return $this->listoInformeGestion3;
    }

    /**
     * Set listoEvaluacionFinal
     *
     * @param boolean $listoEvaluacionFinal
     * @return Academico
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
}
