<?php
require_once "console.php";
include "database.php";
// echo "welcom to equip";

class Jouer{

    public $equip_A;
    public $equip_B;
    public $Score_A;
    public $Score_B;
    public $role;

   
    public function create($nom,$role,$salaire,$conn){
    $sql="INSERT INTO Joueur(Pseudo,role,salaire) values('$nom','$role','$salaire') ;";
    $conn->query($sql);
     
    }
     public function edit(){

    }
     public function delete(){

    }

     public function affichage($conn){
      $select = "SELECT * FROM Joueur ";
      $result = $conn->query($select);
      $lesJoueurs = mysqli_fetch_all($result, MYSQLI_ASSOC);
          echo "id    || name              || jeu            \n";
      foreach($lesJoueurs as $Joueur){
        echo "=========================================================";
          echo "\n".$Joueur['id']."   || ".$Joueur['Pseudo']."              || ".$Joueur['role']."             ||".$Joueur['role']."            \n";

      }

    }
}

while(true){

    
    echo "\n";
    echo "==== CLUBE ==== \n";
    echo "1. add une Joueur \n";
    echo "2. list  des Joueurs \n" ;
    echo "3. delete Joueur \n";
    echo "4. edit Joueur \n";
    echo "0. Exit \n";
    // $console = new Console();
    $choix2 = $console -> input("Entre votre Choix : ");
    
    switch($choix2){
        case '1':  
            echo "saisir name de Joueur" ;
            $nom = $console->input(": ");
            
            echo "saisir le role de Joueur" ;
            $role = $console->input(": ");

            echo "saisir le salaire de Joueur" ;
            $salaire = $console->input(": ");

            $NewJoueur=new Jouer();
            $NewJoueur->create($nom,$role,$salaire,$conn);
            break;
        case '2':  
            $NewJoueur=new Jouer();
            $NewJoueur->affichage($conn);
            break;

            
            case '0':
                include "indexx.php";
            break;
            default:
            echo "le choix pas disponible";
            break;
            
        }
}
