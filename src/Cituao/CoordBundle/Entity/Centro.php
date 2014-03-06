<?php

namespace Cituao\CoordBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;


 /**
 *  
 * @ORM\Table(name="Centro")
 * @ORM\Entity(repositoryClass="Cituao\CoordBundle\Entity\CoordRepository")
 */
class Centro
{
     /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
	 * @Assert\NotBlank(message="El nombre es obligatorio")
     */
    private $nombre;

    /**
     * @var string
	 * @Assert\NotBlank(message="La direccion es obligatorio")
     */
    private $direccion;

    /**
     * @var string
	 * @Assert\NotBlank(message="El teléfono es obligatorio")
     */
    private $telefono;

    /**
     * @var string
	 */
    private $extension;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $url;


    /**
	* @ORM\OneToMany(targetEntity="Cituao\CoordBundle\Practicante", mappedBy = "centro")	
	**/
	protected $practicantes;

    /**
	* @ORM\OneToMany(targetEntity="Cituao\ExternoBundle\Externo", mappedBy = "centro")	
	**/
	protected $externos;
	
	
	public function __construct()
    {
        $this->practicantes = new ArrayCollection();
		$this->externos = new ArrayCollection();
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
     * Set nombre
     *
     * @param string $nombre
     * @return Centro
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
     * Set direccion
     *
     * @param string $direccion
     * @return Centro
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    
        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Centro
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    
        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set extension
     *
     * @param string $extension
     * @return Centro
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;
    
        return $this;
    }

    /**
     * Get extension
     *
     * @return string 
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Centro
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
     * Set url
     *
     * @param string $url
     * @return Centro
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }
	
	public function getExternos(){
		return $this->externos;
	
	}
}
