<?php 
class LoginUser{
	// class properties
	private $email;
	private $password;
	public $error;
	public $success;
	private $storage = "data.json";
	private $stored_users;

	// class methods
	public function __construct($email, $password){
		$this->email = $email;
		$this->password = $password;
		$this->stored_users = json_decode(file_get_contents($this->storage), true);
		$this->login();
	}


	private function login(){
		foreach ($this->stored_users as $user) {
			if($user['email'] == $this->email){
				if(password_verify($this->password, $user['password'])){
					session_start();
					$_SESSION['user'] = $this->email;
					header("location: user_profile.php"); exit();
				}
			}
		}
		return $this->error = "Wrong email or password";
	}

}
