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
				
		$this->assertEquals(1, count($users[0]->getProfile()));
		
		
		
		
	}
	
	public function testCanSaveProfile(){
		//setup user
		$u = $this->getTestUser() ;
		//setup profile
		$profile = $this->getTestProfile();
				
		$u->setProfile($profile);
		
		$em = $this->doctrineContainer->getEntityManager();
		$em->persist($u);
		$em->flush();
		
		//look for user created
		$qry = $em->getRepository('Touchwire\Entity\User')->findOneBy(array('username' => 'Patrick'));
		//setup new profile
		$newProfile = $this->getTestNewProfile();
		$qry->setProfile($newProfile);
		
		$em->persist($qry);
		$em->flush();
		
		$this->assertEquals(1, count($qry));
		
		$this->assertEquals("Musoke", $qry->getProfile()->getFirstname());
	}
	//setup test user
	public function getTestUser(){
		$u = new User();
		$u->setUsername("Patrick");
		$u->setPassword("123");
		return $u;
	}
	
	public function getTestProfile(){
		$p = new Profile();
		$p->setFirstname('Mukasa');
		$p->setLastname('Patrick');
		$p->setGender('Male');
		$p->setEmail('me@you.com');
		$p->setAddress('P.O. Box 5151 Kampala');
		$p->setPhone('077123456');
		return $p;
	}
	
	public function getTestNewProfile(){
		//new Profile
		$np = new Profile();
		$np->setFirstname('Musoke');
		$np->setLastname('John');
		$np->setGender('Male');
		$np->setEmail('me@you.com');
		$np->setAddress('P.O. Box 5151 Kampala');
		$np->setPhone('077123456');
		return $np;
	}
	
}