<?php
class Touchwire_Form_User extends EasyBib_Form
{
	/**
	 * Configure user form.
	 *
	 * @return void
	 */
	public function init()
	{
		// form config
		//$this->setMethod('POST');
		//$this->setAction('/test/add');
		$this->setAttribs(array('id' => 'UserForm',
								'class' => 'nice blue'));

		// create elements
		$userId      = new Zend_Form_Element_Hidden('id');
		$firstname        = new Zend_Form_Element_Text('firstname');
		$lastname        = new Zend_Form_Element_Text('lastname');
		$submit      = new Zend_Form_Element_Button('submit');
		$cancel      = new Zend_Form_Element_Button('cancel');

		// config elements
		$userId->addValidator('digits');

		$firstname->setLabel('Firstname:')
		->setRequired(true)
		->setAttribs(array('class' => 'input-text'));

		$lastname->setLabel('Lastname:')
		->setRequired(true)
		->setAttribs(array('class' => 'input-text'));

		
		$submit->setLabel('Save')
			->setAttribs(array('class' => 'small blue nice button radius save'));
		
		$cancel->setLabel('Cancel')
			->setAttribs(array('class' => 'small red nice button radius'));

		// add elements
		$this->addElements(array(
				$userId, $firstname, $lastname, $submit, $cancel
		));

		// add display group
		$this->addDisplayGroup(
				array('firstname', 'lastname', 'submit', 'cancel'),
				'users'
		);
		$this->getDisplayGroup('users')->setLegend('Add User')
		->setAttribs(array('class' => 'blue-form'));

		// set decorators
		EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'submit', 'cancel');

	}
	
	public function setDefaultsFromEntity(\Touchwire\Entity\User $user) {
		$values = array(
            'id' => $user->getId(),
            'firstname' => $user->getFirstname(),
            'lastname' => $user->getLastname(),
            );
        $this->setDefaults($values);
	}
	
	
}