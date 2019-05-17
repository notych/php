<?php
include 'UniversalSQL.php';
class NmySQL extends UniversalSQL {
    function __construct($host,$user,$password,$dbname)
    {
        parent::__construct($host,$user,$password,$dbname);
        $this->link = mysql_connect($this->host, $this->user, $this->password);
        mysql_select_db($this->dbname,$this->link);
		mysql_set_charset('utf8',$this->link); 
    }    
    function querySQL()
    {
        $result = mysql_query($this->SQL,$this->link);
		if($this->issqlqury)
        {
	        while ($row = mysql_fetch_assoc($result))
            {    
                $r[] = $row;
            }    
			$this->setData($r);
		}
		return $this;	
    }
    function __destruct()
    {
		mysql_close($this->link);
    }   
}     
?>
