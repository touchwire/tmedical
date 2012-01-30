<?php

namespace Touchwire\Entity;

class UserTest
	extends \ModelTestCase
{
	public function testCanCreateUser(){
		$this->assertInstanceOf('Touchwire\Entity\User', new User());
	}
	
	public function testCanSaveFirstAndLastname(){
		$u = new User();
		$u->setFirstname("John");
		$u->setLastname("Musoke");
		
		$em = $this->doctrineContainer->getEntityManager();
		$em->persist($u);
		$em->flush();
		
		
		$users = $em->createQuery('select u from Touchwire\Entity\User u')->execute();
		
		$this->assertEquals(1, count($users));
		
		$this->assertEquals('John', $users[0]->getFirstname());
		$this->assertEquals('Musoke', $users[0]->getLastname());
	}
	
	public function testCanAddProfileToUser(){
		$u = new User();
		$u->setFirstname("John");
		$u->setLastname("Musoke");	//create a function for this later
		$profile = new Profile();
		$profile->setItem('Mukasa');
		$profile->setDescription('This is the name of the user');
		
		
		$u->setProfile($profile);
		
		$em = $this->doctrineContainer->getEntityManager();
		$em->persist($u);
		$em->flush();
		
		$users = $em->createQuery('select u from Touchwire\Entity\User u')->execute();
		
		$this->assertEquals(1, count($users));
		$users = $em->createQuery('select u from Touchwire\Entity\User u')->execute();
		
		$this->assertEquals(1, count($users[0]->getProfile()));
	}
	
}