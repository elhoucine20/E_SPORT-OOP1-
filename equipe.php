<?php
require_once "console.php";
include "database.php";
// echo "welcom to equip";

class Equip{

    public $name;
    public $jeu;

   
    public function create($nom,$jeu,$conn){
    $sql="INSERT INTO equipes(name,jeu) values('$nom','$jeu') ;";
    $conn->query($sql);
     
    }
     public function edit(){

    }
     public function delete(){

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
            $NewEquip=new Equip();
            $NewEquip->create($name,$jeu,$conn);
            break;
        case '2':  
            $NewEquip=new Equip();
            $NewEquip->affichage($conn);
            break;

            
            case '0':
                include "indexx.php";
            break;
            default:
            echo "le choix pas disponible";
            break;
            
        }
}
