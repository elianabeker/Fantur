<?php

namespace Fantur\FanturBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paquetes
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Paquetes
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
     * @ORM\OneToOne(targetEntity="Destinos")
     * @ORM\JoinColumn(name="destino_id", referencedColumnName="id")
     */
    private $destino;

    /**
     * @ORM\OneToOne(targetEntity="Hoteles")
     * @ORM\JoinColumn(name="hotel_id", referencedColumnName="id")
     */
    private $hotel;

    /**
     * @ORM\OneToOne(targetEntity="Eventos")
     * @ORM\JoinColumn(name="eventO_id", referencedColumnName="id")
     */
    private $eventos;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FechaIda", type="date")
     */
    private $fechaIda;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FechaVuelta", type="date")
     */
    private $fechaVuelta;

    /**
     * @var string
     *
     * @ORM\Column(name="Precio", type="decimal")
     */
    private $precio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FechaExpiracion", type="date")
     */
    private $fechaExpiracion;

     /**
     * @var \Integer
     *
     * @ORM\Column(name="Transporte", type="integer")
     */
    private $transporte;


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
     * Set destino
     *
     * @param string $destino
     * @return Paquetes
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

    /**
     * Set hotel
     *
     * @param string $hotel
     * @return Paquetes
     */
    public function setHotel($hotel)
    {
        $this->hotel = $hotel;

        return $this;
    }

    /**
     * Get hotel
     *
     * @return string 
     */
    public function getHotel()
    {
        return $this->hotel;
    }

    /**
     * Set eventos
     *
     * @param string $eventos
     * @return Paquetes
     */
    public function setEventos($eventos)
    {
        $this->eventos = $eventos;

        return $this;
    }

    /**
     * Get eventos
     *
     * @return string 
     */
    public function getEventos()
    {
        return $this->eventos;
    }

    /**
     * Set fechaIda
     *
     * @param string $fechaIda
     * @return Paquetes
     */
    public function setFechaIda($fechaIda)
    {
        $this->fechaIda = $fechaIda;

        return $this;
    }

    /**
     * Get fechaIda
     *
     * @return string 
     */
    public function getFechaIda()
    {
        return $this->fechaIda;
    }

    /**
     * Set fechaVuelta
     *
     * @param string $fechaVuelta
     * @return Paquetes
     */
    public function setFechaVuelta($fechaVuelta)
    {
        $this->fechaVuelta = $fechaVuelta;

        return $this;
    }

    /**
     * Get fechaVuelta
     *
     * @return string 
     */
    public function getFechaVuelta()
    {
        return $this->fechaVuelta;
    }

    /**
     * Set precio
     *
     * @param string $precio
     * @return Paquetes
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return string 
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set fechaExpiracion
     *
     * @param \DateTime $fechaExpiracion
     * @return Paquetes
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
     * Set transporte
     *
     * @param integer $transporte
     * @return Paquetes
     */
    public function setTransporte($transporte)
    {
        $this->transporte = $transporte;

        return $this;
    }

    /**
     * Get transporte
     *
     * @return integer 
     */
    public function getTransporte()
    {
        return $this->transporte;
    }
}
