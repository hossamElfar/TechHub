<?php 
class Register{
	 private $name;
	 private $email;
	private $password;
	private $encPassword;
	 private $errors;

	public function __construct(){
		$this->errors = array();
		$this->name = $_POST['nameUp'];
		$this->email = $_POST['emailUp'];
		$this->password = $_POST['passwordUp'];
		$this->encPassword = md5($this->password);
	}	


	public function validateData(){
		if(empty($this->name) || empty($this->email) || empty($this->password) )
		{
			$this->errors[] = "Fields cannot be empty";
		}
		if($this->emailExists())
			$this->errors[] = "Email already exists";
		if($this->emailFormatError())
			$this->errors[] = "Email format is wrong";

		

	}

	public function emailExists(){
		$db = new mysqli('localhost','root','','library');
		$email = $db->query("SELECT email FROM users WHERE email = '{$this->email}'");
		if($email->num_rows){
			return true;
		}
		else
			return false;
	}

	public function emailFormatError(){
		if(!filter_var($this->email,FILTER_VALIDATE_EMAIL))
			return true;
		return false;
	}

	public function register(){
		$this->validateData();
		if(count($this->errors) == 0){
			//register user here
			$db = new mysqli('localhost','root','','library');
			$insertUser = $db->prepare("INSERT INTO users (name,email,password) VALUES (?,?,?)");
			$insertUser->bind_param('sss',$this->name,$this->email,$this->encPassword);
			$insertUser->execute();
			return true;
		}
		else{
			$this->showErrors();
			return false;
		}
	}

	public function showErrors(){
		foreach ($this->errors as $error) {
			echo $error.'<br>';
		}
	}
}
?>