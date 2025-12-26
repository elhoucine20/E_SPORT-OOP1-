<?php
require_once "console.php";
include "database.php";

class Equip implements Gestion{

    public $name;
    public $jeu;
    private $club_id;

    
    public function SetClub_id($club_id){
        return $this->club_id=$club_id;
    }

    public function GetClub_id(){
        return $this->club_id;
    }

   
    public function create($nom,$jeu,$conn){
    $sql="INSERT INTO equipes(name,jeu,club_id) values('$nom','$jeu',$this->club_id) ;";
    $conn->query($sql);
     
    }
         public function edit($id,$Nnom,$Njeu,$conn){
      $sql = "UPDATE equipes 
                      SET name = '$Nnom', jeu = '$Njeu' 
                      WHERE id = '$id'";
      $conn->query($sql);

    }

     public function delete($id,$conn){
    $sql = "DELETE FROM equipes  WHERE id = '$id'";
    $conn->query($sql);
  
    }

     public function affichage($conn){
      $select = "SELECT * FROM equipes ";
      $result = $conn->query($select);
      $lesEquipes = mysqli_fetch_all($result, MYSQLI_ASSOC);
          echo "id    || name              || jeu            \n";
      foreach($lesEquipes as $equip){
        //   echo "\n".$equip.['id'].' '.' '.$equip['name'].' '.' '.' '.$equip['jeu']."\n";
        echo "==============================================";
          echo "\n".$equip['id']."   || ".$equip['name']."              || ".$equip['jeu']."        \n";

      }

    }
}

while(true){

    
    echo "\n";
    echo "==== CLUBE ==== \n";
    echo "1. add une equipe \n";
    echo "2. list  d'equipes \n" ;
    echo "3. delete equipe \n";
    echo "4. edit equipe \n";
    echo "0. Exit \n";
    // $console = new Console();
    $choix2 = $console -> input("Entre votre Choix : ");
    
    switch($choix2){
        case '1':  
            echo "saisir name de l'equipe" ;
            $name = $console->input(": ");
            
            echo "saisir le jeu" ;
            $jeu = $console->input(": ");
              echo "saisir id de clube" ;
            $IDclube = $console->input(": ");

            $NewEquip=new Equip();
            $NewEquip->SetClub_id($IDclube);
            $NewEquip->create($name,$jeu,$conn);

            break;
        case '2':  
            $NewEquip=new Equip();
            $NewEquip->affichage($conn);
            break;


             case '3':  
          echo "saisir id" ;
            $id = $console->input(": ");
            $SupEquip=new Equip();
            $SupEquip->delete($id,$conn);
            break;
            
        case '4':  
       echo "saisir id de l'equipe" ;
            $id = $console->input(": ");

            echo "saisir new name de l'equipe" ;
            $Nname = $console->input(": ");
            
            echo "saisir new jeu" ;
            $Njeu = $console->input(": ");
            $NewEquip=new Equip();
            $NewEquip->edit($id,$Nname,$Njeu,$conn);
            break;
            
            case '0':
           exit();
            break;
            default:
            echo "\nle choix pas disponible\ns'il vous plais saisir autre choix\n";
            break;
            
        }
}
