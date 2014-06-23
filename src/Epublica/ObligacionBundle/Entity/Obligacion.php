<?php

namespace Epublica\ObligacionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Epublica\ObligacionBundle\Entity\ObligacionRepository")
 */
class Obligacion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="texto", type="text")
     */
    private $texto;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_expiracion", type="datetime")
     */
    private $fechaExpiracion;

   /** @ORM\ManyToOne(targetEntity="Epublica\ListaBundle\Entity\Lista") */
    private $lista;


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
     * @return Obligacion
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
     * Set texto
     *
     * @param string $texto
     * @return Obligacion
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;

        return $this;
    }

    /**
     * Get texto
     *
     * @return string 
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * Set fechaExpiracion
     *
     * @param \DateTime $fechaExpiracion
     * @return Obligacion
     */
    public function setFechaExpiracion($fechaExpiracion)
    {
        $this->fechaExpiracion = $fechaExpiracion;

        return $this;
    }

    /**
     * Get fechaExpiracion
     *
     * @return \DateTime 
     */
    public function getFechaExpiracion()
    {
        return $this->fechaExpiracion;
    }

    /**
     * Set lista
     *
     * @param Epublica\ListaBundle\Entity\Lista $lista
     */
    public function setLista($lista)
    {
        $this->lista = $lista;

        return $this;
    }

    /**
     * Get lista
     *
     * @return string 
     */
    public function getLista()
    {
        return $this->lista;
    }
    
    public function __toString() {
        return $this->nombre;
    }
}
