<?php
class ALEGRA{
  static function GET($mUrl, $mToken, $mType){
    $mHeaders = array('Authorization: '.$mType.' '. $mToken);
    $mCurl 		= curl_init();
    curl_setopt($mCurl,CURLOPT_URL,$mUrl);
    curl_setopt($mCurl,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($mCurl,CURLOPT_TIMEOUT, 30);
		curl_setopt($mCurl,CURLOPT_HTTPHEADER, $mHeaders);
		$rs = curl_exec($mCurl);
		curl_close ($mCurl);
		return $rs;
  }

  static function POST($mUrl, $mToken, $mType, $mParam){
		$mHeaders = array('Authorization: '.$mType.' '.$mToken);
		$mCurl 		= curl_init();
		curl_setopt($mCurl,CURLOPT_URL,$mUrl);
		curl_setopt($mCurl,CURLOPT_POST, 1);
		curl_setopt($mCurl,CURLOPT_POSTFIELDS,$mParam);
		curl_setopt($mCurl,CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($mCurl,CURLOPT_CONNECTTIMEOUT ,3);
		curl_setopt($mCurl,CURLOPT_TIMEOUT, 30);
		curl_setopt($mCurl,CURLOPT_HTTPHEADER, $mHeaders);
		$rs = curl_exec($mCurl);
		curl_close ($mCurl);
		return $rs;
	}

  static function DELETE($mUrl, $mToken, $mType){
		$mHeaders = array('Authorization: '.$mType.' '. $mToken);
		$mCurl 		= curl_init();

		curl_setopt($mCurl,CURLOPT_URL,$mUrl);
		curl_setopt($mCurl,CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($mCurl,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($mCurl,CURLOPT_TIMEOUT, 20);
		curl_setopt($mCurl,CURLOPT_HTTPHEADER, $mHeaders);
		$rs = curl_exec($mCurl);
		curl_close ($mCurl);
		return $rs;
	}

  static function PUT($mUrl, $mToken, $mType, $mParam){
    $mHeaders = array('Authorization: '.$mType.' '. $mToken);
		$mCurl 		= curl_init();

		curl_setopt($mCurl,CURLOPT_URL,$mUrl);
		curl_setopt($mCurl,CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($mCurl,CURLOPT_POST, 1);
		curl_setopt($mCurl,CURLOPT_POSTFIELDS,$mParam);
		curl_setopt($mCurl,CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($mCurl,CURLOPT_CONNECTTIMEOUT ,3);
		curl_setopt($mCurl,CURLOPT_TIMEOUT, 20);
		curl_setopt($mCurl,CURLOPT_HTTPHEADER, $mHeaders);
		$response = curl_exec($mCurl);
		curl_close ($mCurl);
		return $response;
	}
}

?>
