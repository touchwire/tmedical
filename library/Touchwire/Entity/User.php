<?php
namespace  Touchwire\Entity;

//use Doctrine\Common\Collections;
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
	 * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
	 * @var integer
	 */
	private $id;
	
	/**
	 * @Column(type="string", unique=true, length = 100)
	 * @var string
	 */
	private $username;
	
	/**
	 * @Column(type="string", length = 50)
	 * @var string
	 */
	private $password;
	
	/**
	 * 
	 * @OneToOne(targetEntity="Profile", mappedBy="user", cascade={"persist", "remove"}  )
	 * 
	 */
	private $profile;
	
	
	/**
	 * @Column(type="datetime", nullable= false)
	 * @var datetime
	 */
	private $created;
	
	/**
	 * @Column(type="datetime", nullable = true)
	 * @var datetime
	 * */
	private $updated;
	
	public function __construct(){
		//generate created date
		$this->created = new \DateTime("now");
	}
		
	
		
	/**
	 * @return the $id
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return the $username
	 */
	public function getUsername() {
		return $this->username;
	}

	/**
	 * @return the $password
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * @return the $profile
	 */
	public function getProfile() {
		return $this->profile;
	}

	/**
	 * @param number $id
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * @param string $username
	 */
	public function setUsername($username) {
		$this->username = $username;
	}

	/**
	 * @param string $password
	 */
	public function setPassword($password) {
		$this->password = $password;
	}

	/**
	 * @param field_type $profile
	 */
	public function setProfile($profile) {
		$this->profile = $profile;
	}
	
	/**
	 * @return the $created
	 */
	public function getCreated() {
		return $this->created;
	}

	/**
	 * @param \Touchwire\Entity\datetime $created
	 */
	public function setCreated($created) {
		$this->created = $created;
	}
	/**
	 * @return the $updated
	 */
	public function getUpdated() {
		return $this->updated;
	}

	/**
	 * @param \Touchwire\Entity\datetime $updated
	 */
	public function setUpdated($updated) {
		$this->updated = new \DateTime("now");
	}


	
	
	
}