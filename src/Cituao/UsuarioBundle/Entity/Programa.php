<?php

namespace Cituao\UsuarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
}
