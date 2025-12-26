<?php
require_once "console.php";
include "database.php";


class Touenoi implements Gestion{
    public $title;
    private $montant;
    public $format;

    public function setMontante($montant){
     return $this->montant=$montant;
    }

    public function getMontante(){
        return $this->montant;
    }
      
    public function create($title,$format,$conn){
    $sql="INSERT INTO Tournoi(Titre,montant,format) values('$title','$this->montant','$format') ;";
    $conn->query($sql);
     
    }
     public function edit($id,$NTitre,$Nformat,$conn){
        $sql = "UPDATE Tournoi 
                      SET Titre = '$NTitre', montant = '$this->montant' ,format = '$Nformat'
                      WHERE id = '$id'";
        $conn->query($sql);

    }
  public function delete($id,$conn){
    $sql = "DELETE FROM Sponsor  WHERE id = '$id'";
    $conn->query($sql);
  
    }

      public function affichage($conn){
      $select = "SELECT * FROM Tournoi ";
      $result = $conn->query($select);
      $lesTournoi = mysqli_fetch_all($result, MYSQLI_ASSOC);
          echo "id    || Titre              || montant            ||format              \n";
      foreach($lesTournoi as $Tournoi){
        echo "==================================================================";
          echo "\n".$Tournoi['id']."   || ".$Tournoi['Titre']."              || ".$Tournoi['montant']."            ||".$Tournoi['format']."             \n";

      }

    }
}


while(true){

    
    echo "\n";
    echo "==== CLUBE ==== \n";
    echo "1. add une tournoi \n";
    echo "2. list des tournois \n" ;
    echo "3. delete tournoi \n";
    echo "4. edit tournoi \n";
    echo "0. Exit \n";
    // $console = new Console();
    $choix2 = $console -> input("Entre votre Choix : ");
    
    switch($choix2){
        case '1':  
            echo "saisir Titre de tournoi" ;
            $title = $console->input(": ");
            
            echo "saisir le montant" ;
            $montant = $console->input(": ");

             echo "saisir le format de tournoi" ;
            $format = $console->input(": ");


            $NewTournoi=new Touenoi();
            $NewTournoi->setMontante($montant);
            $NewTournoi->create($title,$format,$conn);
            break;
        case '2':  
            $NewTournoi=new Touenoi();
            $NewTournoi->affichage($conn);
            break;

       case '3':  
          echo "saisir id" ;
            $id = $console->input(": ");
            $SupTournoi=new Touenoi();
            $SupTournoi->delete($id,$conn);
            break;

    case '4':  
            echo "saisir id de tournoi" ;
            $id = $console->input(": ");

            echo "saisir new TITRE de tournoi" ;
            $Ntitre = $console->input(": ");
            
            echo "saisir new MONTANT de tournoi" ;
            $Nmontant = $console->input(": ");

            echo "saisir new FORMAT de tournoi" ;
            $Nformat = $console->input(": ");

            $NewTournoi=new Touenoi();
            $NewTournoi->setSalaire($Nmontant);
            $NewTournoi->edit($id,$Ntitre,$Nformat,$conn);
            break;

            case '0':
                include "indexx.php";
            break;
            default:
            echo "le choix pas disponible";
            break;
            
        }
}
