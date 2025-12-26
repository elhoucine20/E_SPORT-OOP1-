<?php
require_once "console.php";
include "database.php";
// echo "welcom to equip";

class Jouer implements Gestion{

    public $Pseudo;
    public $role;
    private $salaire;
    private $lequipe;

   

    public function setSalaire($salaire){
        return $this->salaire=$salaire;
    }

    public function getSalaire(){
        return $this->salaire;
    }

       

    public function setEquipe($léquipe){
        return $this->lequipe=$léquipe;
    }

    public function getEquipe(){
        return $this->lequipe;
    }

    public function create($nom,$role,$conn){
    $sql="INSERT INTO Joueur(Pseudo,role,salaire,equip_id) values('$nom','$role','$this->salaire','$this->lequipe')";
    $conn->query($sql);
     
    }
       public function edit($id,$Nnom,$Nrole,$conn){
      $sql = "UPDATE Joueur 
                      SET Pseudo = '$Nnom', role = '$Nrole' ,salaire='$this->salaire'
                      WHERE id = '$id'";
      $conn->query($sql);
    }
     public function delete($id,$conn){
    $sql = "DELETE FROM Joueur  WHERE id = '$id'";
    $conn->query($sql);
  
    }

     public function affichage($conn){
      $select = "SELECT * FROM Joueur ";
      $result = $conn->query($select);
      $lesJoueurs = mysqli_fetch_all($result, MYSQLI_ASSOC);
          echo "id    || Pseudo                 || role                ||equip_id\n";
      foreach($lesJoueurs as $Joueur){
        echo "===========================================================================";
          echo "\n".$Joueur['id']."   || ".$Joueur['Pseudo']."              || ".$Joueur['role']."             ||".$Joueur['equip_id']."            \n";

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

              echo "saisir l'equipe de Joueur" ;
            $léquipe = $console->input(": ");

            $NewJoueur=new Jouer();
            $NewJoueur->setSalaire($salaire);
            $NewJoueur->setEquipe($léquipe);
            $NewJoueur->create($nom,$role,$conn);
            break;
        case '2':  
            $NewJoueur=new Jouer();
            $NewJoueur->affichage($conn);
            break;
       case '3':  
          echo "saisir id" ;
            $id = $console->input(": ");
            $SupJoueur=new Jouer();
            $SupJoueur->delete($id,$conn);
            break;

    case '4':  
            echo "saisir id de Joueur" ;
            $id = $console->input(": ");

            echo "saisir new name de Joueur" ;
            $Nnom = $console->input(": ");
            
            echo "saisir new role de Joueur" ;
            $Nrole = $console->input(": ");

            echo "saisir new salaire de Joueur" ;
            $Nsalaire = $console->input(": ");

            $NewJoueur=new Jouer();
            $NewJoueur->setSalaire($Nsalaire);
            $NewJoueur->edit($id,$Nnom,$Nrole,$conn);
            break;
            
            case '0':
               exit();
            break;

            default:
            echo "le choix pas disponible\ns'il vous plais saisir autre choix";
            break;
            
        }
}
