<?php

use GuzzleHttp\Client;

class privyid_api {


  function tesGet($url, $user, $pass)
  {

    // list($baseurl, $endpoint) = func_get_args();
    $client = new GuzzleHttp\Client(['verify' => false]);

    $resp = $client->request('GET', $url, ['auth' => [$user,$pass]]);

    echo $resp->getBody();
  }

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