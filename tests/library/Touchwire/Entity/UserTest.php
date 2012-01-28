<?php

namespace Touchwire\Entity;

class UserTest
	extends \ModelTestCase
{
	public function testCanCreateUser(){
		$this->assertInstanceOf('Touchwire\Entity\User', new User());
	}
	
}