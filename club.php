<?php
require_once "console.php";
include "database.php";

// echo "welcom to club";
 
class Club{
   public $name;
   public $ville;

    public function create($nom,$location,$conn){
    $sql="INSERT INTO club(name,ville) values('$nom','$location') ;";
    $conn->query($sql);
     
    }
     public function edit(){

    }
     public function delete(){

    }
     public function affichage(){

    }
}
//  for($i=0;$i<1;$i++) {
while(true){

    
    echo "\n";
    echo "==== CLUBE ==== \n";
    echo "1. add une clube \n";
    echo "2. edit clube \n" ;
    echo "3. delete clube \n";
    echo "4. list de clubes \n";
    echo "0. Exit \n";
    // $console = new Console();
    $choix2 = $console -> input("Entre votre Choix : ");
    
    switch($choix2){
        case '1':  
            echo "saisir name" ;
            $name = $console->input(": ");
            
            echo "saisir location" ;
            $ville = $console->input(": ");
            $NewClub=new Club();
            $NewClub->create($name,$ville,$conn);
            
            break;
            

            case '0':
                include "indexx.php";
            break;
            default:
            echo "le choix pas disponible";
            break;
            
        }
}