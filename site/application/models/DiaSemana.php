<?php

namespace models;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @Table(name="diassemana")
 * @Entity
 */
class DiaSemana extends My_Models
{	

    public function __construct() {

        $this->horariosDeAtencion = new \Doctrine\Common\Collections\ArrayCollection();

    }
    
    /**
     * @var integer $id
     *
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

	/**
     * @var string $nombre
     * @Column(name="nombre", type="string", length=25, nullable=true)
     */
    protected $nombre;

    /**
     * @OneToMany(targetEntity="HorarioDeAtencion", mappedBy="diaSemana", fetch="EXTRA_LAZY")
     */         
    protected $horariosDeAtencion = array();

   
}
