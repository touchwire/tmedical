<?php

class Users_AdminController extends Zend_Controller_Action
{
	/**
	 * @var Bisna\Application\Container\DoctrineContainer
	 */
	protected $doctrine;
	
	/**
	 * @var Doctrine\ORM\EntityManager
	 */
	protected $entityManager;
	
	/**
	 * @var Touchwire\Entity\Repository\UserRepository
	 */
	protected $userRepository;

	//
    public function init()
    {
         $this->doctrine = Zend_Registry::get('doctrine');
         $this->entityManager = $this->doctrine->getEntityManager();
         $this->userRepository = $this->entityManager->getRepository('\Touchwire\Entity\User');
    }

    public function indexAction()
    {
        //action body
    }

    public function createAction()
    {
         $form = new Touchwire_Form_User();

        if ($this->getRequest()->isPost() && $form->isValid($_POST)) {
             $user = new \Touchwire\Entity\User();

             $this->userRepository->saveUser($user, $form->getValues());

             $this->entityManager->flush();
    
             $this->_helper->flashMessenger->addMessage('Stand saved.');
            
             return $this->_redirect('/users/admin/list');
        }

        $this->view->form = $form;
    }

    public function updateAction()
    {
    	$form = new Touchwire_Form_User('update');
    	
    	$id = $this->getRequest()->getParam('id');
    	
    	if ($id == null) {
    		throw new Exception('Id must be provided for the edit action');
    	}
    	
    	$user = $this->userRepository->findOneBy(array('id' => $id));
    	
    	if ($this->getRequest()->isPost() && $form->isValid($_POST)) {
    		
    		$this->userRepository->saveUser($user, $form->getValues());
    		
    		$this->entityManager->flush();
    		
    		return $this->_redirect('/users/admin/list');
    	}
    	
    	$form->setDefaultsFromEntity($user); // pass values to form
    	
    	$this->view->form = $form;
    	$this->view->userDetail = $user;
    }

    public function deleteAction()
    {
    	$id = $this->getRequest()->getParam('id');
    	
    	if ($id == null) {
    		throw new Exception('Id must be provided for the edit action');
    	}
    	
    	$this->userRepository->removeUser($id);
    	
    	$this->entityManager->flush();
    	
    	return $this->_redirect('/users/admin/list');
    }

    public function listAction()
    {
        $users = $this->userRepository->findAll();
        $this->view->users = $users;
    }


}









