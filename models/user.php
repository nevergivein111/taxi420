<?php
class User extends AppModel {
	var $name = 'User';
		var $hasMany = array(
		'Single' => array(
			'className' => 'Single',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
		
	var $validate = array(
	       'username' => array(
	             'alphaNumeric' => array(
	             'rule' => 'alphaNumeric',
	             'allowEmpty' => false,
	             'message' => 'Alphabets and numbers only'
	            ),					 
	             'between' => array(
	             'rule' => array('between', 3, 15),
	             'allowEmpty' => false,
	             'message' => 'username must be between 3 15 characters'
	            ),
	             'isUnique' => array(
	             'rule' => 'isUnique',
	             'message' => 'username already taken'
	            )							 
	       ),

	 
		   'email' => array(
	             'between' => array(
	             'rule' => 'email',
	             'allowEmpty' => false,
	             'message' => 'Provide Valid Email'
	            ),
	             'isUnique' => array(
	             'rule' => 'isUnique',
	             'message' => 'email already Registerd if you forgot you paassword click(Forgot password)'
	            )					 
	       )

	);
		function createTempPassword($len) {
  $pass = '';
  $lchar = 0;
  $char = 0;
  for($i = 0; $i < $len; $i++) {
    while($char == $lchar) {
      $char = rand(48, 109);
      if($char > 57) $char += 7;
      if($char > 90) $char += 6;
    }
    $pass .= chr($char);
    $lchar = $char;
  }
  return $pass;
}

}
?>