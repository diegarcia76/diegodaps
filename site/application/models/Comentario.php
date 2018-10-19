<?php

namespace models;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @Table(name="comentarios")
 * @Entity
 */
class Comentario extends My_Models
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
     * @OneToOne(targetEntity="Cliente" , cascade={"persist"})
     * @JoinColumn(name="cliente_id", referencedColumnName="id")
     **/
     protected $usuario = null;


      /**
     * @var datetime $fecha
     *
     * @Column(name="fecha", type="datetime", nullable=true)
     */
     protected $fecha;
	 
	 /**
     * @var text $comentario
     *
     * @Column(name="comentario", type="text", nullable=true)
     */
     protected $comentario;

    
	
}
