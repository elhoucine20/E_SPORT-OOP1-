<?php
require_once "console.php";
include "database.php";

//  interface 
class Club implements Gestion{
   public $name;
   public $ville;

    public function create($nom,$location,$conn){
    $sql="INSERT INTO club(name,ville) values('$nom','$location') ;";
      if($conn->query($sql)){
        echo "club est crée ave succes";
      }else{
        echo "Erruer!!";
      }
    }
 
     public function edit($id,$Nnom,$Nlocation,$conn){
   $sql = "UPDATE club 
                      SET name = '$Nnom', ville = '$Nlocation' 
                      WHERE id = '$id'";
        if($conn->query($sql)){
        echo "\nclub est modifier ave succes✅\n";
      }else{
        echo "\nErruer❗\n";
      }

    }

     public function delete($id,$conn){
    $sql = "DELETE FROM club  WHERE id = '$id'";
    $conn->query($sql);
  
    }
      public function affichage($conn){
      $select = "SELECT * FROM club ";
      $result = $conn->query($select);
      $lesClubs = mysqli_fetch_all($result, MYSQLI_ASSOC);
          echo "id    || name                  || ville            \n";
      foreach($lesClubs as $club){
        echo "==============================================";
          echo "\n".$club['id']."   || ".$club['name']."              || ".$club['ville']."        \n";

      }

    }
    public function AffichageAvecLesEquipes(){
  //  $sql=" SELECT club.name , club.ville  "
    }
  
}
while(true){

    
    echo "\n";
    echo "==== CLUBE ==== \n";
    echo "1. add une clube \n";
    echo "2. list de clubes \n" ;
    echo "3. delete clube \n";
    echo "4. edit clube \n";
    echo "0. Exit \n";
    // $console = new Console();
    $choix2 = $console -> input("Entre votre Choix : ");
    
    switch($choix2){
      case '1':  
        $NewClub=new Club();
          echo "saisir name" ;
            $name = $console->input(": ");
          echo "saisir location" ;
            $ville = $console->input(": ");
            $NewClub->create($name,$ville,$conn);
        break;

      case '2':  
            $NewClub=new Club();
            $NewClub->affichage($conn);    
        break;
      case '3':  
          echo "saisir id" ;
            $id = $console->input(": ");
            $SupClub=new Club();
            $SupClub->delete($id,$conn);
        break;
      case '4':  
          echo "saisir id" ;
            $id = $console->input(": ");
            
          echo "saisir new name" ;
            $Nname = $console->input(": ");
          echo "saisir new ville" ;
            $Nville = $console->input(": ");

            $NewClub=new Club();
            $NewClub->edit($id,$Nname,$Nville,$conn);
            
        break;

      case '0':
      exit();
        break;

            
      default:
            echo "\n   le choix pas disponible\n s'il vous plais saisir autre choix\n";
      break;
            
        }
}