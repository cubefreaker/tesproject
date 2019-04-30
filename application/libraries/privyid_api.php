<?php

if (!class_exists('Curl\Curl')) {
  include('./vendor/phpcurl/ArrayUtil.php');
  include('./vendor/phpcurl/Curl.php');
  include('./vendor/phpcurl/MultiCurl.php');
  include('./vendor/phpcurl/CaseInsensitiveArray.php');
}

use Curl\Curl;

class privyid_api {

  function userRegistration($url, $auth, $data)
  {
    $curl = new Curl();
    $data['identityCard'] = new CURLFile($data['file']);

    $curl->setBasicAuthentication($auth['username'], $auth['password']);
    $curl->setHeader('Content-Type', 'application/json');

    $Result = FALSE;
    $curl->post($url, $data);
    if (!$curl->error) {
        $Result = $curl->response;
    }else{
        echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
    }
    $curl->close();
    return array('response'=> $Result);
  }

  function getRegStatus($url, $data, $token) {
    $curl = new Curl();

    $curl->setBasicAuthentication($auth['username'], $auth['password']);
    $curl->setHeader('Content-Type', 'application/json');
    
    $Result       = FALSE;
    $curl->get($url, $data);
    if (!$curl->error) {
      $Result = $curl->response;
    }
    else {
        echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
    }
    $curl->close();
    return array('response'=>$Result);
  }

  function postDocument($url, $auth, $data)
  {
    $curl = new Curl();

    $curl->setBasicAuthentication($auth['username'], $auth['password']);
    $curl->setHeader('Content-Type', 'application/json');

    $Result = FALSE;
    $curl->post($url, $data);
    if (!$curl->error) {
        $Result = $curl->response;
    }else{
        echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
    }
    $curl->close();
    return array('response'=> $Result);
  }

}