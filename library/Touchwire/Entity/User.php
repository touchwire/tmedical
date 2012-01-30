<?php

namespace  Touchwire\Entity;
/** 
 * @Entity(repositoryClass="Touchwire\Entity\Repository\UserRepository")
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
	
	/**
	 * 
	 * @OneToOne(targetEntity="Profile",cascade={"persist", "remove"}  )
	 * @JoinColumn(name="profile_id", referencedColumnName="id")
	 */
	private $profile;
	
	
	/**
	 * @return the $profile
	 */
	public function getProfile() {
		return $this->profile;
	}

	/**
	 * @param field_type $profile
	 */
	public function setProfile($profile) {
		$this->profile = $profile;
	}

	/**
	 * @return the $id
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param number $id
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * @return the $firstname
	 */
	public function getFirstname() {
		return $this->firstname;
	}

	/**
	 * @return the $lastname
	 */
	public function getLastname() {
		return $this->lastname;
	}

	/**
	 * @param string $firstname
	 */
	public function setFirstname($firstname) {
		$this->firstname = $firstname;
	}

	/**
	 * @param string $lastname
	 */
	public function setLastname($lastname) {
		$this->lastname = $lastname;
	}

	/*public function __get($property){
		return $this->property;
	}
	 
	public function __set($property, $value){
		$this->property = $value;		
	}*/
	
}