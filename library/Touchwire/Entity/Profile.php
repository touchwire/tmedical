<?php
namespace Touchwire\Entity;

/**
 * @Entity(repositoryClass="Touchwire\Entity\Repository\ProfileRepository")
 * @Table(name="profile")
 *
 * @author development
 *
 */

class Profile{
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
	 * @Column(type="string", length = 10)
	 * @var string
	 */
	private $gender;
	
	/**
	 * @Column(type="string", length = 100)
	 * @var string
	 */
	private $email;
	
	/**
	 * @Column(type="string", length = 100)
	 * @var string
	 */
	private $address;
	
	/**
	 * @Column(type="string", length = 100)
	 * @var string
	 */
	private $phone;
	
	/**
	 * @return the $id
	 */
	public function getId() {
		return $this->id;
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
	 * @return the $gender
	 */
	public function getGender() {
		return $this->gender;
	}

	/**
	 * @return the $email
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @return the $address
	 */
	public function getAddress() {
		return $this->address;
	}

	/**
	 * @return the $phone
	 */
	public function getPhone() {
		return $this->phone;
	}

	/**
	 * @param number $id
	 */
	public function setId($id) {
		$this->id = $id;
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

	/**
	 * @param string $gender
	 */
	public function setGender($gender) {
		$this->gender = $gender;
	}

	/**
	 * @param string $email
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * @param string $address
	 */
	public function setAddress($address) {
		$this->address = $address;
	}

	/**
	 * @param string $phone
	 */
	public function setPhone($phone) {
		$this->phone = $phone;
	}

	
	
		
	
}