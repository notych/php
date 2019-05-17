<?php
include_once 'iWorkData.php';

class Json implements iWorkData
{
  private $Data;
  private $filename;

  function __construct($filename) 
  {
    $this->filename = $filename;
    if (file_exists($filename))
    {    
        $this->Data = (array)json_decode(file_get_contents($this->filename));
    }    
//        var_dump($this);
  }
  function saveData($key, $val)
  {
      $this->Data[$key] = $val;
  }

  function getData($key)
  {
      return $this->Data[$key]; 
  }

  function deleteData($key)
  {
    unset($this->Date[$key]);
  }
  function __destruct()
  {
     file_put_contents($this->filename, json_encode($this->Data));
  }
}
?>
