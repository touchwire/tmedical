<?php

class Users_AdminControllerTest extends Zend_Test_PHPUnit_ControllerTestCase
{

    public function setUp()
    {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
    }

    public function testCanDisplayUserAdminIndex()
    {
        // go to the main page of the web application
        $this->dispatch('/users/admin/');
        
		// check if we don't end up on an error page
        //$this->assertNotController('error');
        //$this->assertNotAction('error');
        
		// ok, no error so let's see if we're at our homepage
        $this->assertModule('users');
        $this->assertController('admin');
        $this->assertAction('index');
        $this->assertResponseCode(200);
    }

    public function testCanDisplayUserAdminCreatePage()
    {
        // go to the main page of the web application
        $this->dispatch('/users/admin/create');
        
		// check if we don't end up on an error page
        //$this->assertNotController('error');
        //$this->assertNotAction('error');
        
		// ok, no error so let's see if we're at our homepage
        $this->assertModule('users');
        $this->assertController('admin');
        $this->assertAction('create');
        $this->assertResponseCode(200);
    }
    /*
    public function testCanDisplayUserAdminUpdatePage()
    {
        // go to the main page of the web application
        $this->dispatch('/users/admin/update');
        
		// check if we don't end up on an error page
        //$this->assertNotController('error');
        //$this->assertNotAction('error');
        
		// ok, no error so let's see if we're at our homepage
        $this->assertModule('users');
        $this->assertController('admin');
        $this->assertAction('update');
        $this->assertResponseCode(200);
    }
    
    public function testCanDisplayUserAdminDeletePage()
    {
        // go to the main page of the web application
        $this->dispatch('/users/admin/delete');
        
		// check if we don't end up on an error page
        $this->assertNotController('error');
        $this->assertNotAction('error');
        
		// ok, no error so let's see if we're at our homepage
        $this->assertModule('users');
        $this->assertController('admin');
        $this->assertAction('delete');
        $this->assertResponseCode(200);
    }

    public function testCanDisplayUserAdminListPage()
    {
        // go to the main page of the web application
        $this->dispatch('/users/admin/list');
        
		// check if we don't end up on an error page
        $this->assertNotController('error');
        $this->assertNotAction('error');
        
		// ok, no error so let's see if we're at our homepage
        $this->assertModule('users');
        $this->assertController('admin');
        $this->assertAction('list');
        $this->assertResponseCode(200);
    }
*/

}











