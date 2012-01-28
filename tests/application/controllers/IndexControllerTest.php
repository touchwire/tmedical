<?php

class IndexControllerTest extends Zend_Test_PHPUnit_ControllerTestCase
{

    public function setUp()
    {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
    }

    public function testCanDisplayIndexPage()
    {
        // go to the main page of the web application
        $this->dispatch('/');
        
		// check if we don't end up on an error page
        $this->assertNotController('error');
        $this->assertNotAction('error');
        
		// ok, no error so let's see if we're at our homepage
        $this->assertModule('default');
        $this->assertController('index');
        $this->assertAction('index');
        $this->assertResponseCode(200);
    }


}



