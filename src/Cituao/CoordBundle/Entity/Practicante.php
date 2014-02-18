<?php

namespace Cituao\CoordBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


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
     * @ORM\Column(type="string", length=3)
     */
    private $tipo;

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
    private $fechainformeAvance1;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechainformeAvance2;

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
    private $fechainformeGestion1;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechainformeGestion2;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechainformeGestion3;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechainformeFinal;


	/**
	* @ORM\ManyToOne(targetEntity="Cituao\CoordBundle\Entity\Area", inversedBy="practicantes")
	* @ORM\JoinColumn(name="id_area", referencedColumnName = "id") 
	**/	
	protected $area;


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
     * Set modalidad
     *
     * @param string $modalidad
     * @return Practicante
     */
    public function setModalidad($modalidad)
    {
        $this->modalidad = $modalidad;
    
        return $this;
    }

    /**
     * Get modalidad
     *
     * @return string 
     */
    public function getModalidad()
    {
        return $this->modalidad;
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
     * Set foto
     *
     * @param string $foto
     * @return Practicante
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;
    
        return $this;
    }

    /**
     * Get foto
     *
     * @return string 
     */
    public function getFoto()
    {
        return $this->foto;
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
     * Set fechainformeAvance1
     *
     * @param \DateTime $fechainformeAvance1
     * @return Practicante
     */
    public function setFechainformeAvance1($fechainformeAvance1)
    {
        $this->fechainformeAvance1 = $fechainformeAvance1;
    
        return $this;
    }

    /**
     * Get fechainformeAvance1
     *
     * @return \DateTime 
     */
    public function getFechainformeAvance1()
    {
        return $this->fechainformeAvance1;
    }

    /**
     * Set fechainformeAvance2
     *
     * @param \DateTime $fechainformeAvance2
     * @return Practicante
     */
    public function setFechainformeAvance2($fechainformeAvance2)
    {
        $this->fechainformeAvance2 = $fechainformeAvance2;
    
        return $this;
    }

    /**
     * Get fechainformeAvance2
     *
     * @return \DateTime 
     */
    public function getFechainformeAvance2()
    {
        return $this->fechainformeAvance2;
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
     * Set fechainformeGestion1
     *
     * @param \DateTime $fechainformeGestion1
     * @return Practicante
     */
    public function setFechainformeGestion1($fechainformeGestion1)
    {
        $this->fechainformeGestion1 = $fechainformeGestion1;
    
        return $this;
    }

    /**
     * Get fechainformeGestion1
     *
     * @return \DateTime 
     */
    public function getFechainformeGestion1()
    {
        return $this->fechainformeGestion1;
    }

    /**
     * Set fechainformeGestion2
     *
     * @param \DateTime $fechainformeGestion2
     * @return Practicante
     */
    public function setFechainformeGestion2($fechainformeGestion2)
    {
        $this->fechainformeGestion2 = $fechainformeGestion2;
    
        return $this;
    }

    /**
     * Get fechainformeGestion2
     *
     * @return \DateTime 
     */
    public function getFechainformeGestion2()
    {
        return $this->fechainformeGestion2;
    }

    /**
     * Set fechainformeGestion3
     *
     * @param \DateTime $fechainformeGestion3
     * @return Practicante
     */
    public function setFechainformeGestion3($fechainformeGestion3)
    {
        $this->fechainformeGestion3 = $fechainformeGestion3;
    
        return $this;
    }

    /**
     * Get fechainformeGestion3
     *
     * @return \DateTime 
     */
    public function getFechainformeGestion3()
    {
        return $this->fechainformeGestion3;
    }

    /**
     * Set fechainformeFinal
     *
     * @param \DateTime $fechainformeFinal
     * @return Practicante
     */
    public function setFechainformeFinal($fechainformeFinal)
    {
        $this->fechainformeFinal = $fechainformeFinal;
    
        return $this;
    }

    /**
     * Get fechainformeFinal
     *
     * @return \DateTime 
     */
    public function getFechainformeFinal()
    {
        return $this->fechainformeFinal;
    }

	/**
     * Set area
     *
     * @param Cituao\CoordBundle\Entity\Tipo $area
     */
    public function setTipo(\Cituao\CoordBundle\Entity\Area $area)
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



}
