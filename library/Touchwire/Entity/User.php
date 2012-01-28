<?php

namespace  Touchwire\Entity;
/** 
 * @Entity
 * @Table(name="users")
 * 
 * @author development
 *
 */
use Doctrine\DBAL\Types\StringType;

class User{
	
	/**
	 * @Id 
	 * @Column(type="integer", nullable = false) 
	 * @GeneratedValue 
	 * @var integer
	 */
	private $id;
	
	/**
	 * @Column(type="string", length = 100)
	 * @var string
	 */
	private $firstname;
	
	/**
	 * @Column(type="string", length = 100)
	 * @var string
	 */
	private $lastname;
	
}