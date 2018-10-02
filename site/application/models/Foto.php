<?php

namespace models;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @Table(name="fotos")
 * @Entity
 */
class Foto extends My_Models
{	
    
    public function __construct(){
        
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
     * @var boolean $temporal
     * @Column(name="temporal", type="boolean", nullable=true)
     */
    protected $temporal = true;

    /**
     * @var string $extension
     * @Column(name="extension", type="string", nullable=true)
     */
    protected $extension;

	/**
     * @ManyToOne(targetEntity="Turno", inversedBy="fotos")
     * @JoinColumn(name="turno_id", referencedColumnName="id")
     **/
    protected $turno = null;

    /**
     * @OneToOne(targetEntity="Cliente", mappedBy="foto")
     **/
    protected $cliente = null;

    /**
     * @OneToOne(targetEntity="Coiffeur", mappedBy="foto")
     **/
    protected $coiffeur = null;

    
	
}
