<?php

class Wallets
{

  public function __construct()
  {
    /**
     * Todo
     * 1. Realise, init db connect
     * 2. Realise, init logger
     */
  }

  public function __call($methodname, $arguments)
  {
    // Todo: log request here
    $params = get_object_vars($arguments[0]);

    $wallet = $params['wallet'] ?? '9997894561231234';
    if (!$this->ValidateWallet($wallet)) {
      //return error
    }

    $response = $this->$methodname($params);
    // Todo: log response here
    return $response;
  }

  public function ValidateWallet($wallet)
  {
    if (preg_match('/^998[0-9]{2}[0-9]{7}$/', $wallet)) {
      // this is phone
      return true;
    } elseif (preg_match('/^[9]{3}[1-9]{13}$/', $wallet)) {
      // this is account
      return true;
    }
    // incorrect wallet
    return false;
  }

  public function PerformTransaction($params)
  {
    $amount = $params['amount'];
    $limit = $params['limit'];

    if ($amount > $limit) {
      // return error
      return 'error';
    }
    return 'success';
  }

  public function CheckTransaction($params)
  {
    return true;
  }

  public function CancelTransaction($params)
  {
    return true;
  }

  public function GetStatement($params)
  {
    return true;
  }

  public function GetInformation($params)
  {
    return [
      'wallet' => $params['wallet'],
      'limit' => rand(100, 124500000)
    ];
  }

  public function ChangePassword($params)
  {
    return true;
  }
}
