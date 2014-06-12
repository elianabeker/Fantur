<?php

namespace Fantur\FanturBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hoteles
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Hoteles
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
     * @ORM\Column(name="Nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\ManyToOne(targetEntity="Destinos")
     * @ORM\JoinColumn(name="destino_id", referencedColumnName="id")
     */
    private $destino;


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
     * @return Hoteles
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
     * Set destino
     *
     * @param string $destino
     * @return Hoteles
     */
    public function setDestino($destino)
    {
        $this->destino = $destino;

        return $this;
    }

    /**
     * Get destino
     *
     * @return string 
     */
    public function getDestino()
    {
        return $this->destino;
    }
    
        public function __toString() {
        return $this->nombre;
    }
}
