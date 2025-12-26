<?php
include "console.php";


 interface   Gestion{
public function create($a,$b,$c);
public function edit($a,$b,$c,$d);
public function delete($a,$b);
public function affichage($a);
}


 for($i=0;$i<1;$i++) {
    echo "\n";
    echo "==== E_SPORT ==== \n";
    echo "1. Gestion des clubes \n";
    echo "2. Gestion d'eequipes \n" ;
    echo "3. UGestion des tournois \n";
    echo "4. Gestion des joeurs \n";
    echo "5. Gestion des sponsor \n";
    echo "6. Gestion des matchs \n";
    echo "0. Exit \n";

    $console = new Console();
    $choix =$console ->  input("Entre votre Choix");

 switch($choix){
   case '1':   include "club.php";
      break;
      
   case '2':   include "equipe.php";
      break;

   case '3':   include "tournoi.php";
      break;

   case '4':   include "joeur.php";
      break;

   case '5':   include "Sponsor.php";
      break;

   case '6':   include "matchs.php";
      break;
   default:
   echo "le choix pas disponible";
      break;

 }
}
?>