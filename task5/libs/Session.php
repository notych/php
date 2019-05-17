<?php

class Session implements iWorkData
{

  public function saveData($key, $val) 
  {
      $_SESSION[$key] = $val;
  }

  public function getData($key) 
  {
      return $_SESSION[$key];
  }

  public function deleteData($key) 
  {
      unset($_SESSION[$key]);
  }

}

?>
