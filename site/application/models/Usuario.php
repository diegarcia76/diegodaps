<?php

namespace models;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @Table(name="usuarios")
 * @Entity
 */
class Usuario extends My_Models
{	

    public function __construct() {
      	//$this->turnos = new \Doctrine\Common\Collections\ArrayCollection(); 
        $this->notificacionesXUsuario = new \Doctrine\Common\Collections\ArrayCollection();         
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
     * @Column(name="nombre", type="string", length=250, nullable=false)
     */
    protected $nombre;

	/**
     * @var string $email
     * @Column(name="email", type="string", length=255, nullable=true)
     */
    protected $email;

    /**
     * @var string $password
     * @Column(name="password", type="string", nullable=true)
     */
    protected $pass;

    /**
     * @var datetime $fecha_alta
     * @Column(name="fecha_alta", type="datetime", nullable=true)
     */
    protected $fecha_alta;

    /**
     * @var string $activo
     * @Column(name="activo", type="boolean", nullable=true)
     */
    protected $activo = true;

    /**
     * @ManyToOne(targetEntity="Perfil", inversedBy="usuarios")
     * @JoinColumn(name="perfil_id", referencedColumnName="id")
     */ 
    protected $perfil;

    /**
     * @OneToMany(targetEntity="NotificacionXUsuario", mappedBy="usuario", orphanRemoval=true)
     **/
    protected $notificacionesXUsuario = null;    

    public function getNotificaciones(){
        return \Managers\NotificacionXUsuarioManager::getInstance()->getByUser($this);
    }

    public function getNotificacionesVistas(){
        return \Managers\NotificacionXUsuarioManager::getInstance()->getByUser($this, 1);
    }

}
