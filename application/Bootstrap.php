<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	/* view helpers */
	function __initView(){
		
		$this->bootstrap('layout');
		$layout = $this->getResource('layout');
		$view = $layout->getView();
		
		$view->doctype('HTML4_STRICT');
		$view->HeadMeta()->appendEquiv('content-type', 'text/html;chartset=UTF-8');
		$view->headTitle('My Site')->setSeparator(' :: ');
		
	}


}

