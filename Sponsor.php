<?php
require_once "console.php";
include "database.php";

 
class Sponsor{
   public $name;
   public $Contribution;

    public function create($nom,$Contribution,$conn){
    $sql="INSERT INTO Sponsor(name,Contribution) values('$nom','$Contribution') ;";
    $conn->query($sql);
     
    }
    
     public function edit($id,$Nnom,$Ncontribution,$conn){
        $sql = "UPDATE Sponsor 
                      SET name = '$Nnom', Contribution = '$Ncontribution' 
                      WHERE id = '$id'";
        $conn->query($sql);

    }
     public function delete(){

    }
      public function affichage($conn){
      $select = "SELECT * FROM Sponsor ";
      $result = $conn->query($select);
      $lesSponsor = mysqli_fetch_all($result, MYSQLI_ASSOC);
          echo "id    || name                    || Contribution            \n";
      foreach($lesSponsor as $sponsor){
        echo "=================================================";
          echo "\n".$sponsor['id']."   || ".$sponsor['name']."              || ".$sponsor['Contribution']."        \n";

      }

    }
}
//  for($i=0;$i<1;$i++) {
while(true){

    
    echo "\n";
    echo "==== CLUBE ==== \n";
    echo "1. add une sponsor \n";
    echo "2. list des sponsors \n";
    echo "3. delete sponsor \n";
    echo "4. edit sponsor \n" ;
    echo "0. Exit \n";
    $choix2 = $console -> input("Entre votre Choix : ");
    
    switch($choix2){
        case '1':  
            echo "saisir name de sponsor" ;
            $name = $console->input(": ");
            
            echo "saisir Contribution de sponsor" ;
            $Contribution = $console->input(": ");
            
            $NewSponsor=new Sponsor();
            $NewSponsor->create($name,$Contribution,$conn);
            
            break;
              case '2':  
            $NewSponsor=new Sponsor();
            $NewSponsor->affichage($conn);
            break;


               case '4':  
            echo "saisir id" ;
            $id = $console->input(": ");
            
            echo "saisir new name de sponsor" ;
            $Nname = $console->input(": ");
             echo "saisir new Contribution" ;
            $Ncontribution = $console->input(": ");

            $NewSponsor=new Club();
            $NewSponsor->edit($id,$Nname,$Ncontribution,$conn);
            
            break;
            case '0':
                include "indexx.php";
            break;
            default:
            echo "le choix pas disponible";
            break;
            
        }
}