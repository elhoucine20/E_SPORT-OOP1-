<?php
require_once "console.php";
include "database.php";
// echo "welcom to equip";

class Jouer{

    public $Pseudo;
    public $role;
    private $salaire;

   

    public function setSalaire($salaire){
        return $this->salaire=$salaire;
    }

    public function getSalaire(){
        return $this->salaire;
    }

    public function create($nom,$role,$conn){
    $sql="INSERT INTO Joueur(Pseudo,role,salaire) values('$nom','$role','$this->salaire') ;";
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
          echo "id    || Pseudo                 || role            \n";
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
            $NewJoueur->setSalaire($salaire);
            $NewJoueur->create($nom,$role,$conn);
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
