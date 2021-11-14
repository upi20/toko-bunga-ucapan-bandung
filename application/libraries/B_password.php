<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class B_password {

	private $hash_prefix = '$2y$10$';

	/**
    * @var
    *
    * Bcrpt hash
    *
    */
	public function bcrypt_hash($password,$round = 10)
	{
		$config = array(
			'cost' => $round
		);

		return password_hash($password, PASSWORD_BCRYPT, $config);
	}

	/**
    * @var
    *
    * Hash check
    *
    */
	public function hash_check($password,$hashed_password)
	{
		return password_verify($password, $hashed_password);
	}		
}
