<?php
class database{

    public $host;
    public $db_name;
    public $username;
    public $password;
    
public function __construct($hos,$db,$name,$pass){
  
  $this->host=$hos;
  $this->db_name=$db;
  $this->username=$name;
  $this->password=$pass;
}
public function getConnection(){
  $connect = mysqli_connect($this->host,$this->username,$this->password,$this->db_name);
  return $connect;
}
}

$d_base=new database("localhost","clubs","root","");
$conn=$d_base->getConnection();

// if($conn){
//   echo "connextion valide";
// }

