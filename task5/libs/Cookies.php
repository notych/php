<?php

class Cookies implements iWorkData
{
  public function saveData($key, $val) 
  {
      return setcookie($key, $val, time()+300);
  }
  public function getData($key) 
  {
      return $_COOKIE[$key];
  }
  public function deleteData($key) 
  {
      setcookie($key, $this->getData($key), time()+0);
      unset($_COOKIE[$key]);
  }

}

?>
