<?php

class ContactModel{
	public function getContact($mId){
		$rs = ALEGRA::GET(API.'contacts/'.$mId, TOKEN, TYPE);
		return $rs;
	}

	public function getAllContact(){
		$rs = ALEGRA::GET(API.'contacts/', TOKEN, TYPE);
		return $rs;
	}

	public function newContact($mParam){
		$rs = ALEGRA::POST(API.'contacts/', TOKEN, TYPE, $mParam);
		return $rs;
	}

	public function updateContact($mParam, $mId){
		$rs = ALEGRA::PUT(API.'contacts/'.$mId, TOKEN, TYPE, $mParam);
		return $rs;
	}

	public function deleteContact($mId){
		$rs = ALEGRA::DELETE(API.'contacts/'.$mId, TOKEN, TYPE);
		return $rs;
	}
}
