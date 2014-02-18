<?php
namespace Cituao\CoordBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
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
     * @ORM\Column(type="string", length=3)
     */
    private $tipo;



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
     * @ORM\Column(type="string", length=2)
     */
    private $estado;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechaAsesoria1;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechaAsesoria2;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechaAsesoria3;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechaAsesoria4;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechaAsesoria5;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechaAsesoria6;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechaAsesoria7;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechaVisitaP;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechaVisita1;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechaVisita2;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechaInformeGestion1;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechaInformeGestion2;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechaInformeGestion3;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechaInformeFinal;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $path;


	/**
     * @Assert\File(maxSize="6000000")
     */
    private $file;

	/**
	* @ORM\ManyToOne(targetEntity="Cituao\CoordBundle\Entity\Area", inversedBy="practicantes")
	* @ORM\JoinColumn(name="id_area", referencedColumnName = "id") 
	**/	
	protected $area;



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
     * Set fechaAsesoria1
     *
     * @param \DateTime $fechaAsesoria1
     * @return Practicante
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
     * @return Practicante
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
     * @return Practicante
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
     * @return Practicante
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
     * @return Practicante
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
     * @return Practicante
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
     * @return Practicante
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
     * @return Practicante
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
     * @return Practicante
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
     * @return Practicante
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
     * Set area
     *
     * @param Cituao\CoordBundle\Entity\Area $area
     */
    public function setArea(\Cituao\CoordBundle\Entity\Area $area)
    {
        $this->area = $area;
    }


  
    /**
     * Get area
     *
     * @return Cituao\CoordBundle\Entity\Area
     */
    public function getArea()
    {
        return $this->area;
    }


    /**
     * Set fechaInformeGestion1
     *
     * @param \DateTime $fechaInformeGestion1
     * @return Practicante
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
     * @return Practicante
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
     * @return Practicante
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
     * Set fechaInformeFinal
     *
     * @param \DateTime $fechaInformeFinal
     * @return Practicante
     */
    public function setFechaInformeFinal($fechaInformeFinal)
    {
        $this->fechaInformeFinal = $fechaInformeFinal;
    
        return $this;
    }

    /**
     * Get fechaInformeFinal
     *
     * @return \DateTime 
     */
    public function getFechaInformeFinal()
    {
        return $this->fechaInformeFinal;
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
        return 'uploads/documents';
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
		
		$nombre = $this->ci;
		$this->getFile()->move(
		    $this->getUploadRootDir(),
		    $nombre   //$this->getFile()->getClientOriginalName()
		);
		
		// set the path property to the filename where you've saved the file
		//$this->path = $this->getFile()->getClientOriginalName();
		$this->path = $nombre;
		// clean up the file property as you won't need it anymore
		$this->file = null;	
	}


}
