<?php
include_once 'iWorkData.php';
class MySQL implements iWorkData
{
    private $Data;
    private $db;
    private $table;

    public function __construct($host,$dbname,$user,$password,$table) 
    {
        $this->table=$table;  
        try {
            $this->db = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $password);
        } catch (PDOException $e) {
            echo  $e->getMessage();
        }

    }

    function saveData($key, $val){
        try {
            if (!$this->getData($key)) {
                $sql="INSERT INTO `" . $this->table. "` (`keys`,'value`) VALUES ('".$key."','".$val."')";
                $this->db->query($sql);
            } else {
                $this->db->query("UPDATE `".$this->table."` SET `value`='".$val."' WHERE `keys`='".$key."'");  
            }     
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
  }

  function getData($key)
  {
      try {
           $query = $this->db->prepare("SELECT `keys`,`value` FROM `".$this->table."` WHERE `keys`='".$key."'");
           $query->execute();
           if($query)
           {
                $data = $query->fetchAll(PDO::FETCH_KEY_PAIR);
                return $data[$key];
           }    
           else {return false; }
      } catch (PDOException $e) {
           echo  $e->getMessage();
          return false; 
          }
  }

  function deleteData($key)
  {
    try {
            $query = $this->db->query("DELETE FROM ".$this->table." WHERE SqlVariable='".$key."'");
            return true;
        } catch (PDOException $e) {
             echo  $e->getMessage();
            return false;
        }
   }

}
?>
