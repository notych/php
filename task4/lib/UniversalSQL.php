<?php
abstract class UniversalSQL{
	protected $data1;
	protected $host;
	protected $user;
	protected $password;
	protected $dbname;

	protected $filds;
	protected $table;
	protected $where;
	protected $limit;
	protected $issqlqury=false;
	protected $SQL;
	abstract function querySQL();
   	function __construct($host,$user,$password,$dbname){

		$this->host = $host;
		$this->user = $user;
		$this->password = $password; 
		$this->dbname = $dbname;	
	}
	function clear()
	{
		unset($this->data1);
		unset($this->filds);
		unset($this->table);
		unset($this->where);
		unset($this->limit);
		unset($this->SQL);
	}
	function addFild($fild,$value = NULL)
	{
		$this->filds[$fild] = $value;
	}
	function getFild()
	{
		return $this->filds;
	}
	function addTable($table)
	{
		$this->table[] = $table;
	}
	function getTable($table)
	{
		return $this->table;
	}
	function addWhere($where)
	{
		$this->where[]= $where;
	}
	function getWhere($where)
	{
		$this->where = $where;
	}
	function setLimit($limit)
	{
        $this->limit=$limit;
	}
	function getLimit()
	{
		return $this->limit;
    }
	function setData($data2)
	{
		$this->data1=$data2;
	}
	function getData()
	{
		return $this->data1;
	}
	function prepSelect()
	{
		if(!isset($this->table))
		{
			return false;  
		}
		$s='SELECT ';
		if(isset($this->filds))
		{
			$s.=implode(',',array_keys($this->filds));
		} else
		{
			$s.=" *";
		}
		$s.=' FROM '.implode(',',$this->table);
		if(isset($this->where))
		{
		     $s.=' WHERE '.implode(',',$this->where);
		}
    	if(isset($this->limit))
		{
             $s.=' LIMIT '.$this->limit;
        }    
		$this->SQL=$s;
		$this->issqlqury=true;
		return $s; 
	} 
	function prepInsert()
	{		
		if(!isset($this->table) or (!isset($this->filds)))
		{
			return false;  
		}
		$s='INSERT INTO '.implode(',', $this->table).' ('.implode(',', array_keys($this->filds)).') VALUES ('. implode(',', $this->filds).')'; 
		$this->SQL=$s;	
		$this->issqlqury=false;
		return $s; 
	}
 
	function prepUpdate()
	{
		if(!isset($this->table)or (!isset($this->filds)))
		{
			return false;  
		}
		$s='UPDATE '.implode(',',$this->table).' SET ';
		foreach( $this->filds as $key => $value ) 
		{
			$s.=$key.'='."'".$value."'".',';
		}
		$s = substr($s,0,-1);
		if(isset($this->where))
		{ 
			$s.=' WHERE '.implode($this->where);
		}
		$this->issqlqury=false;
		$this->SQL=$s; 
		return $s;
    }

    function prepDelete()
	{
		if(!isset($this->table)) 
		{
			return false;  
		}
		$s='DELETE FROM '.implode(',',$this->table);
        if(isset($this->where))
		{
			$s.=' WHERE '.implode(',',$this->where);
		}
		$this->issqlqury=false;
		$this->SQL=$s; 
		return $s;	
    }
}
?>
