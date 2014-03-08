<?php
namespace Cituao\CoordBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use \DateTime;

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
     * @Assert\NotBlank(message="El apellido es obligatorio")
     */
    private $codigo;


     /**
     * @ORM\Column(type="string", length=50)
	 * @Assert\NotBlank(message="El apellido es obligatorio")
     */
   private $apellidos;

     /**
     * @ORM\Column(type="string", length=50)
	 * @Assert\NotBlank(message="El nombre es obligatorio")
     */
    private $nombres;

     /**
     * @ORM\Column(type="string", length=12, unique=true)
	 * @Assert\NotBlank(message="La cédula de identidad es obligatorio")
     */
    private $ci;

     /**
     * @ORM\Column(type="string", length=3)
	 */
    private $tipo;

    /**
     * @ORM\Column(type="date")
	 * @Assert\NotBlank(message= "La fecha de matriculación es  necesaria")
	 */
    private $fechaMatriculacion;

    /**
     * @ORM\Column(type="date")
     */
    private $fechaIniciacion;

     /**
     * @ORM\Column(type="string", length=50)
	 * @Assert\Email(message = "No es un email valido")
	 */
    private $emailInstitucional;

     /**
     * @ORM\Column(type="string", length=50)
	 * @Assert\Email(message = "No es un email valido")
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
	* @ORM\JoinColumn(name="area", referencedColumnName = "id") 
	**/	
	protected $area;

	/**
	* @ORM\ManyToOne(targetEntity="Cituao\CoordBundle\Entity\Centro", inversedBy="practicantes")
	* @ORM\JoinColumn(name="centro", referencedColumnName = "id") 
	**/	
	protected $centro;


	/**
	* @ORM\ManyToOne(targetEntity="Cituao\AcademicoBundle\Entity\Academico", inversedBy="practicantes")
	* @ORM\JoinColumn(name="academico", referencedColumnName = "id") 
	**/	
	protected $academico;

	/**
	* @ORM\ManyToOne(targetEntity="Cituao\ExternoBundle\Entity\Externo", inversedBy="practicantes")
	* @ORM\JoinColumn(name="externo", referencedColumnName = "id") 
	**/	
	protected $externo;


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
     * Set fechaIniciacion
     *
     * @param \date $fechaIniciacion
     * @return Practicante
     */
    public function setFechaIniciacion($fechaIniciacion)
    {
        $this->fechaIniciacion = $fechaIniciacion;
    
        return;
    }

    /**
     * Get fechaIniciacion
     *
     * @return \date 
     */
    public function getFechaIniciacion()
    {
        return $this->fechaIniciacion;
    }



    /**
     * Set fechaAsesoria1
     *
     * @param \date $fechaAsesoria1
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
     * @return \date 
     */
    public function getFechaAsesoria1()
    {
        return $this->fechaAsesoria1;
    }

    /**
     * Set fechaAsesoria2
     *
     * @param \date $fechaAsesoria2
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
     * @return \date 
     */
    public function getFechaAsesoria2()
    {
        return $this->fechaAsesoria2;
    }

    /**
     * Set fechaAsesoria3
     *
     * @param \date $fechaAsesoria3
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
     * @return \date 
     */
    public function getFechaAsesoria3()
    {
        return $this->fechaAsesoria3;
    }

    /**
     * Set fechaAsesoria4
     *
     * @param \date $fechaAsesoria4
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
     * @return \date 
     */
    public function getFechaAsesoria4()
    {
        return $this->fechaAsesoria4;
    }

    /**
     * Set fechaAsesoria5
     *
     * @param \date $fechaAsesoria5
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
     * @return \date 
     */
    public function getFechaAsesoria5()
    {
        return $this->fechaAsesoria5;
    }

    /**
     * Set fechaAsesoria6
     *
     * @param \date $fechaAsesoria6
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
     * @return \date 
     */
    public function getFechaAsesoria6()
    {
        return $this->fechaAsesoria6;
    }

    /**
     * Set fechaAsesoria7
     *
     * @param \date $fechaAsesoria7
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
     * @return \date 
     */
    public function getFechaAsesoria7()
    {
        return $this->fechaAsesoria7;
    }


    /**
     * Set fechaVisitaP
     *
     * @param \date $fechaVisitaP
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
     * @return \date 
     */
    public function getFechaVisitaP()
    {
        return $this->fechaVisitaP;
    }

    /**
     * Set fechaVisita1
     *
     * @param \date $fechaVisita1
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
     * @return \date 
     */
    public function getFechaVisita1()
    {
        return $this->fechaVisita1;
    }

    /**
     * Set fechaVisita2
     *
     * @param \date $fechaVisita2
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
     * @return \date 
     */
    public function getFechaVisita2()
    {
        return $this->fechaVisita2;
    }

    /**
     * Set fechaMatriculacion
     *
     * @param \date $fechaMatriculacion
     * @return Practicante
     */
    public function setfechaMatriculacion($fecha)
    {
        $this->fechaMatriculacion = $fecha;
    
        return $this;
    }

    /**
     * Get fechaMatriculacion
     *
     * @return \date 
     */
    public function getfechaMatriculacion()
    {
        return $this->fechaMatriculacion;
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
     * Set area
     *
     * @param Cituao\CoordBundle\Entity\Centro $centro
     */
    public function setCentro(\Cituao\CoordBundle\Entity\Centro $centro)
    {
        $this->centro = $centro;
    }

    /**
     * Get centro
     *
     * @return Cituao\CoordBundle\Entity\Centro
     */
    public function getCentro()
    {
        return $this->centro;
    }

 	/**
     * Set academico
     *
     * @param Cituao\AcademicoBundle\Entity\Academico $academico
     */
    public function setAcademico(\Cituao\AcademicoBundle\Entity\Academico $academico)
    {
        $this->academico = $academico;
    }

    /**
     * Get academico
     *
     * @return Cituao\AcademicoBundle\Entity\Academico
     */
    public function getAcademico()
    {
        return $this->academico;
    }
 	/**
     * Set externo
     *
     * @param Cituao\ExternoBundle\Entity\Academico $academico
     */
    public function setExterno(\Cituao\ExternoBundle\Entity\Externo $externo)
    {
        $this->externo = $externo;
    }

    /**
     * Get externo
     *
     * @return Cituao\CoordExterno\Entity\Externo
     */
    public function getExterno()
    {
        return $this->externo;
    }

    /**
     * Set fechaInformeGestion1
     *
     * @param \date $fechaInformeGestion1
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
     * @return \date 
     */
    public function getFechaInformeGestion1()
    {
        return $this->fechaInformeGestion1;
    }

    /**
     * Set fechaInformeGestion2
     *
     * @param \date $fechaInformeGestion2
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
     * @return \date 
     */
    public function getFechaInformeGestion2()
    {
        return $this->fechaInformeGestion2;
    }

    /**
     * Set fechaInformeGestion3
     *
     * @param \date $fechaInformeGestion3
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
     * @return \date 
     */
    public function getFechaInformeGestion3()
    {
        return $this->fechaInformeGestion3;
    }

    /**
     * Set fechaInformeFinal
     *
     * @param \date $fechaInformeFinal
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
     * @return \date 
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
