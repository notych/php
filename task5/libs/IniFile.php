<?php
include_once 'iWorkData.php';
class IniFile implements iWorkData
{
    private $Data;
    private $filename;

    function __construct($filename) 
    {
        $this->filename = $filename;
        if (file_exists($filename))
        {    
            $this->Data = parse_ini_file($filename);
        }    
//        var_dump($this->Data);
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
        unset($this->Data[$key]);
    }
    function __destruct()
    {
        $str='';
        foreach ($this->Data as $key => $value) 
        {
            $str .= $key . '=' . $value . PHP_EOL;
        }

        file_put_contents($this->filename, $str);
    } 
}
?>
