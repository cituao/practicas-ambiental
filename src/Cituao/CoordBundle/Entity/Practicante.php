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
     * @Assert\NotBlank(message="Es obligatorio!")
	 * @Assert\Regex(pattern="/^\d+$/", match=true, message="Código inválido!")

     */
    private $codigo;


     /**
     * @ORM\Column(type="string", length=50)
	 * @Assert\NotBlank(message="Es obligatorio!")
	 * @Assert\Regex(pattern="/\d/", match=false, message="Apellido inválido!")
     */
   private $apellidos;

     /**
     * @ORM\Column(type="string", length=50)
	 * @Assert\NotBlank(message="Es obligatorio!")
	 * @Assert\Regex(pattern="/\d/", match=false, message="Nombre inválido!")
     */
    private $nombres;

     /**
     * @ORM\Column(type="string", length=12, unique=true)
	 * @Assert\NotBlank(message="Es obligatorio!")
	 * @Assert\Regex(pattern="/^\d+$/", match=true, message="Cédula inválida!")
     */
    private $ci;

     /**
     * @ORM\Column(type="string", length=3)
	 */
    private $tipo;

    /**
     * @ORM\Column(type="date")
	 * @Assert\NotBlank(message= "Es obligatorio!")
	 */
    private $fechaMatriculacion;

    /**
     * @ORM\Column(type="date")
     */
    private $fechaIniciacion;

     /**
     * @ORM\Column(type="string", length=50)
	 * @Assert\Email(message = "Email inválido!")
	 */
    private $emailInstitucional;

     /**
     * @ORM\Column(type="string", length=50)
	 * @Assert\Email(message = "Email inválido!")
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
     * @ORM\Column(type="string", length=30)
     */
    private $pathPdf;
	
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
	* @ORM\ManyToOne(targetEntity="Cituao\UsuarioBundle\Entity\Programa", inversedBy="practicantes")
	* @ORM\JoinColumn(name="programa", referencedColumnName = "id") 
	**/	
	protected $programa;

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
     * @var boolean
     */
    private $listoAsesoria1;

    /**
     * @var boolean
     */
    private $listoAsesoria2;

    /**
     * @var boolean
     */
    private $listoAsesoria3;

    /**
     * @var boolean
     */
    private $listoAsesoria4;

    /**
     * @var boolean
     */
    private $listoAsesoria5;

    /**
     * @var boolean
     */
    private $listoAsesoria6;

    /**
     * @var boolean
     */
    private $listoAsesoria7;

    /**
     * @var boolean
     */
    private $listoVisitaP;

    /**
     * @var boolean
     */
    private $listoVisita1;

    /**
     * @var boolean
     */
    private $listoVisita2;

    /**
     * @var boolean
     */
    private $listoGestion1;

    /**
     * @var boolean
     */
    private $listoGestion2;

    /**
     * @var boolean
     */
    private $listoGestion3;

    /**
     * @var boolean
     */
    private $listoInformeFinal;

   /**
     * @var boolean
     */
    private $listoProyecto;

	
    /**
     * Set listoAsesoria1
     *
     * @param boolean $listoAsesoria1
     * @return Practicante
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
     * @return Practicante
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
     * @return Practicante
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
     * @return Practicante
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
     * @return Practicante
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
     * @return Practicante
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
     * @return Practicante
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
     * @return Practicante
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
     * @return Practicante
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
     * @return Practicante
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
     * Set listoGestion1
     *
     * @param boolean $listoGestion1
     * @return Practicante
     */
    public function setListoGestion1($listoGestion1)
    {
        $this->listoGestion1 = $listoGestion1;
    
        return $this;
    }

    /**
     * Get listoGestion1
     *
     * @return boolean 
     */
    public function getListoGestion1()
    {
        return $this->listoGestion1;
    }

    /**
     * Set listoGestion2
     *
     * @param boolean $listoGestion2
     * @return Practicante
     */
    public function setListoGestion2($listoGestion2)
    {
        $this->listoGestion2 = $listoGestion2;
    
        return $this;
    }

    /**
     * Get listoGestion2
     *
     * @return boolean 
     */
    public function getListoGestion2()
    {
        return $this->listoGestion2;
    }

    /**
     * Set listoGestion3
     *
     * @param boolean $listoGestion3
     * @return Practicante
     */
    public function setListoGestion3($listoGestion3)
    {
        $this->listoGestion3 = $listoGestion3;
    
        return $this;
    }

    /**
     * Get listoGestion3
     *
     * @return boolean 
     */
    public function getListoGestion3()
    {
        return $this->listoGestion3;
    }

    /**
     * Set listoInformeFinal
     *
     * @param boolean $listoInformeFinal
     * @return Practicante
     */
    public function setListoInformeFinal($listoInformeFinal)
    {
        $this->listoInformeFinal = $listoInformeFinal;
    
        return $this;
    }

    /**
     * Get listoInformeFinal
     *
     * @return boolean 
     */
    public function getListoInformeFinal()
    {
        return $this->listoInformeFinal;
    }

    /**
     * Set listoProyecto
     *
     * @param boolean $listoProyecto
     * @return Practicante
     */
    public function setListoProyecto($listoProyecto)
    {
        $this->listoProyecto = $listoProyecto;
    
        return $this;
    }

    /**
     * Get listoProyecto
     *
     * @return boolean 
     */
    public function getListoProyecto()
    {
        return $this->listoProyecto;
    }

    /**
     * Set pathPdf
     *
     * @param string $pathPdf
     * @return Practicante
     */
    public function setPathPdf($pathPdf)
    {
        $this->pathPdf = $pathPdf;
    
        return $this;
    }

    /**
     * Get pathPdf
     *
     * @return string 
     */
    public function getPathPdf()
    {
        return $this->pathPdf;
    }

    /**
     * Set programa
     *
     * @param \Cituao\UsuarioBundle\Entity\Programa $programa
     * @return Practicante
     */
    public function setPrograma(\Cituao\UsuarioBundle\Entity\Programa $programa = null)
    {
        $this->programa = $programa;
    
        return $this;
    }

    /**
     * Get programa
     *
     * @return \Cituao\UsuarioBundle\Entity\Programa 
     */
    public function getPrograma()
    {
        return $this->programa;
    }
}