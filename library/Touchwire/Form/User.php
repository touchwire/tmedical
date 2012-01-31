<?php
class Touchwire_Form_User extends EasyBib_Form
{
	
	/**
	 * Configure user form.
	 *
	 * @return void
	 */
	public function __construct($state = null)
	{
		// form config
		//$this->setMethod('POST');
		//$this->setAction('/test/add');
		$this->setAttribs(array('id' => 'UserForm',
								'class' => 'nice blue'));

		// create elements
		$id      = new Zend_Form_Element_Hidden('id');
		$username = new Zend_Form_Element_Text('username');
		$password = new Zend_Form_Element_Password('password');
		$password2 = new Zend_Form_Element_Password('password2');
		$firstname        = new Zend_Form_Element_Text('firstname');
		$lastname        = new Zend_Form_Element_Text('lastname');
		$gender        = new Zend_Form_Element_Select('gender');
		$email        = new Zend_Form_Element_Text('email');
		$phone        = new Zend_Form_Element_Text('phone');
		$address        = new Zend_Form_Element_Textarea('address');
		$submit      = new Zend_Form_Element_Button('submit');
		$cancel      = new Zend_Form_Element_Button('cancel');

		echo $id;
		// config elements
		$id->addValidator('digits');

		$username->setLabel('Username:')
				 ->setRequired(true)
				 ->setAttribs(array('class' => 'input-text'));
		
		$password->setLabel('Password:')
		->setRequired(true)
		->setAttribs(array('class' => 'input-text'));
		
		$password2->setLabel('Confirm Password:')
		->setRequired(true)
		->setAttribs(array('class' => 'input-text'));
		
		$firstname->setLabel('Firstname:')
		->setRequired(true)
		->setAttribs(array('class' => 'input-text'));

		$lastname->setLabel('Lastname:')
		->setRequired(true)
		->setAttribs(array('class' => 'input-text'));
		
		$gender->setLabel('Sex:')
		->setRequired(true)
		->addMultiOptions(array('Male' => 'Male',
								'Female' => 'Female'));

		$email->setLabel('Email:')
		->setRequired(true)
		->setAttribs(array('class' => 'input-text'));
		
		$phone->setLabel('Phone:')
		->setRequired(true)
		->setAttribs(array('class' => 'input-text'));
		
		$address->setLabel('Address:')
		->setRequired(true)
		->setAttribs(array('rows' => '5', 'cols' => '20'));
		
		$submit->setLabel('Save')
			->setAttribs(array('class' => 'small blue nice button radius save'));
		
		$cancel->setLabel('Cancel')
			->setAttribs(array('class' => 'small red nice button radius'));

		// add account details display group
		if($state == null){
			//elements
			$this->addElements(array(
					$username, $password, $password2
			));
			//display group
			$this->addDisplayGroup(
					array('username', 'password', 'password2'), 
					'account_details'
			);
			
			$this->getDisplayGroup('account_details')->setLegend('Account Details')
			->setAttribs(array('class' => 'blue-form'));
		}
		
		// add remaining elements
		$this->addElements(array(
				$id, $firstname, $lastname, $gender,
				$email, $phone, $address,
				$submit, $cancel
		));
		
		//add personal detils display group
		$this->addDisplayGroup(
				array('firstname', 'lastname', 'gender'),
				'personal_details'
		);
		
		$this->getDisplayGroup('personal_details')->setLegend('Personal Details')
		->setAttribs(array('class' => 'blue-form'));
		
		//add contact details display group
		$this->addDisplayGroup(
				array('email', 'phone', 'address'), 
				'contact_details'
		);
		
		$this->getDisplayGroup('contact_details')->setLegend('Contact Details')
		->setAttribs(array('class' => 'blue-form'));
		
		$this->addDisplayGroup(array('submit', 'cancel'), 'buttons');
				 
		// set decorators
		EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'submit', 'cancel');

	}
	
	public function setDefaultsFromEntity(\Touchwire\Entity\User $user) {
		//remove unwanted fields
		//$this->removeDisplayGroup('account_details');
		//set values
		$values = array(
            'id' => $user->getId(),
            'username' => $user->getUsername(),
            'firstname' => $user->getProfile()->getFirstname(),
			'lastname' => $user->getProfile()->getLastname(),
			'gender' => $user->getProfile()->getGender(),
			'email' => $user->getProfile()->getEmail(),
			'phone' => $user->getProfile()->getPhone(),
			'address' => $user->getProfile()->getAddress(),
            );
        $this->setDefaults($values);
	}
	
	
}