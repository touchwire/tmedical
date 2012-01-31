<?php

namespace Touchwire\Entity;

class UserTest
	extends \ModelTestCase
{
	public function testCanCreateUser(){
		$this->assertInstanceOf('Touchwire\Entity\User', new User());
	}
	
	public function testCanSaveFirstAndLastname(){
		$u = $this->getTestUser() ;
		
		$em = $this->doctrineContainer->getEntityManager();
		$em->persist($u);
		$em->flush();
		
		
		$users = $em->createQuery('select u from Touchwire\Entity\User u')->execute();
		
		$this->assertEquals(1, count($users));
		
		$this->assertEquals('Patrick', $users[0]->getUsername());
		$this->assertEquals('123', $users[0]->getPassword());
	}
	
	public function testCanAddProfileToUser(){
		$u = $this->getTestUser() ;
		//setup profile
		$profile = new Profile();
		$profile->setFirstname('Mukasa');
		$profile->setLastname('Patrick');
		$profile->setGender('Male');
		$profile->setEmail('me@you.com');
		$profile->setAddress('P.O. Box 5151 Kampala');
		$profile->setPhone('077123456');
		
		
		$u->setProfile($profile);
		
		$em = $this->doctrineContainer->getEntityManager();
		$em->persist($u);
		$em->flush();
		
		$users = $em->createQuery('select u from Touchwire\Entity\User u')->execute();
		
		$this->assertEquals(1, count($users));
		$users = $em->createQuery('select u from Touchwire\Entity\User u')->execute();
		
		$this->assertEquals(1, count($users[0]->getProfile()));
		
	}
	
	public function testCanSaveProfile(){
		
	}
	//setup test user
	public function getTestUser(){
		$u = new User();
		$u->setUsername("Patrick");
		$u->setPassword("123");
		return $u;
	}
	
}