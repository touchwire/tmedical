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
	private $item;
	
	/**
	 * @Column(type="string")
	 * @var string
	 */
	private $description;
	
	
	/**
	 * @return the $id
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return the $item
	 */
	public function getItem() {
		return $this->item;
	}

	/**
	 * @return the $description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * @param number $id
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * @param string $item
	 */
	public function setItem($item) {
		$this->item = $item;
	}

	/**
	 * @param string $description
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	
	
}