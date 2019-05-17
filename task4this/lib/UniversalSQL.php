<?php
abstract class UniversalSQL{
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
	protected $data1;

	abstract function querySQL();

   	function __construct($host,$user,$password,$dbname)
    {
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
        return $this;
	}
	function getFilds()
	{
		return $this->filds;
	}
	function addTable($table)
	{
		$this->table[] = $table;
        return $this;
	}
	function getTable()
	{
		return $this->table;
	}
	function addWhere($where)
	{
		$this->where[]= $where;
        return $this;
	}
	function getWhere()
	{
		return $this->where;
	}
	function setLimit($limit)
	{
        $this->limit=$limit;
        return $this;
	}
	function getLimit()
	{
		return $this->limit;
    }
	function setData($data2)
	{
		$this->data1=$data2;
        return $this;
	}
	function getData()
	{
		return $this->data1;
	}
    function getSQL()
    {
        return $this->SQL;
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
		return $this; 
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
		return $this; 
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
		return $this;
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
		return $this;	
    }
}
?>
