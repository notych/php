<?php
include 'UniversalSQL.php';
class PgSQL extends UniversalSQL    {
    function __construct($host,$user,$password,$dbname)
    {
        parent::__construct($host,$user,$password,$dbname);
		$this->link = pg_connect("host=".$this->host." dbname=".$this->dbname." user=".$this->user." password=".$this->password);
    } 

    function querySQL()
    {
        $result = pg_query($this->link,$this->SQL);
		if($this->issqlqury)
        {
	        while ($row = pg_fetch_assoc($result)) $r[] = $row;
			$this->setData($r);
		}
		return $this;	
    }

    function __destruct()
    {
		pg_close($this->link);
    }    

}
?>
