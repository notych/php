
<?php
include 'universalsql.php';
class NmySQL extends UniversalSQL{
    function querySQL(){
		$dbcon = pg_connect("host=".$this->host." dbname=".$this->dbname." user=".$this->user." password=".$this->password);
        $result = pg_query($dbcon,$this->SQL);
		if($this->issqlqury){
	        while ($row = pg_fetch_assoc($result)) $r[] = $row;
			$this->setData($r);
			pg_close($dbcon);
			return $r;	
		}
		pg_close($dbcon);
		return $result;	
    }
}
?>
