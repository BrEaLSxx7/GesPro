<?php
class Response{
	private $user;
	function __construct($data){
		$this->user = $data;
	}
	function response(){
		return json_encode($this->user);
	}
}