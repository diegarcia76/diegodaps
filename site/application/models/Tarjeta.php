<?php

namespace models;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @Table(name="tarjetas")
 * @Entity
 */
class Tarjeta extends My_Models
{	

    public function __construct() {

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
     * @var integer $cuota1
     * @Column(name="cuota1", type="integer", nullable=true)
     */
    protected $cuota1;

    /**
     * @var integer $cuota2
     * @Column(name="cuota2", type="integer", nullable=true)
     */
    protected $cuota2;
	
	 /**
     * @var integer $cuota3
     * @Column(name="cuota3", type="integer", nullable=true)
     */
    protected $cuota3;
	
	 /**
     * @var integer $cuota4
     * @Column(name="cuota4", type="integer", nullable=true)
     */
    protected $cuota4;
	
	 /**
     * @var integer $cuota5
     * @Column(name="cuota5", type="integer", nullable=true)
     */
    protected $cuota5;
	
	 /**
     * @var integer $cuota6
     * @Column(name="cuota6", type="integer", nullable=true)
     */
    protected $cuota6;
	
	 /**
     * @var integer $cuota7
     * @Column(name="cuota7", type="integer", nullable=true)
     */
    protected $cuota7;
	
	 /**
     * @var integer $cuota8
     * @Column(name="cuota8", type="integer", nullable=true)
     */
    protected $cuota8;
	
	 /**
     * @var integer $cuota9
     * @Column(name="cuota9", type="integer", nullable=true)
     */
    protected $cuota9;
	
	 /**
     * @var integer $cuota10
     * @Column(name="cuota10", type="integer", nullable=true)
     */
    protected $cuota10;
	
	 /**
     * @var integer $cuota11
     * @Column(name="cuota11", type="integer", nullable=true)
     */
    protected $cuota11;
	
	 /**
     * @var integer $cuota12
     * @Column(name="cuota12", type="integer", nullable=true)
     */
    protected $cuota12;
	
	
	
	
	
	
	}