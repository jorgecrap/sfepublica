<?php

namespace Epublica\AlertaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
//use Epublica\ObligacionBundle\Util\Util;

/**
 * @ORM\Entity(repositoryClass="Epublica\AlertaBundle\Entity\AlertaRepository")
 */
class Alerta {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /** @ORM\ManyToOne(targetEntity="Epublica\UsuarioBundle\Entity\Usuario") */
    private $usuario;

    /** @ORM\ManyToOne(targetEntity="Epublica\ObligacionBundle\Entity\Obligacion") */
    private $obligacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_envio", type="datetime")
     */
    private $fechaEnvio;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enviada", type="boolean")
     */
    private $enviada;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cumplida", type="boolean")
     */
    private $cumplida;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set usuario
     *
     * @param \Epublica\UsuarioBundle\Entity\Usuario $usuario
     *
     */
    public function setUsuario(\Epublica\UsuarioBundle\Entity\Usuario $usuario) {
        $this->usuario = $usuario;
    }

    /**
     * Get usuario
     *
     * @return string 
     */
    public function getUsuario() {
        return $this->usuario;
    }

    /**
     * Set obligacion
     *
     * @param Epublica\ObligacionBundle\Entity\Obligacion $obligacion
     * 
     */
    public function setObligacion(\Epublica\ObligacionBundle\Entity\Obligacion $obligacion) {
        $this->obligacion = $obligacion;
    }

    /**
     * Get obligacion
     *
     * @return string 
     */
    public function getObligacion() {
        return $this->obligacion;
    }

    /**
     * Set fechaEnvio
     *
     * @param \DateTime $fechaEnvio
     * @return Alerta
     */
    public function setFechaEnvio($fechaEnvio) {
        $this->fechaEnvio = $fechaEnvio;

        return $this;
    }

    /**
     * Get fechaEnvio
     *
     * @return \DateTime 
     */
    public function getFechaEnvio() {
        return $this->fechaEnvio;
    }

    /**
     * Set enviada
     *
     * @param boolean $enviada
     * @return Alerta
     */
    public function setEnviada($enviada) {
        $this->enviada = $enviada;

        return $this;
    }

    /**
     * Get enviada
     *
     * @return boolean 
     */
    public function getEnviada() {
        return $this->enviada;
    }

    /**
     * Set cumplida
     *
     * @param boolean $cumplida
     * @return Alerta
     */
    public function setCumplida($cumplida) {
        $this->cumplida = $cumplida;

        return $this;
    }

    /**
     * Get cumplida
     *
     * @return boolean 
     */
    public function getCumplida() {
        return $this->cumplida;
    }

   

}
