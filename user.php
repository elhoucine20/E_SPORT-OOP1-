<?php

class personne{

    public $prenom;
    public $age;
    public $role;
    public $nom;
    
    function __construct($Fname,$Lname,$Age,$Role){
        $this->nom = $Fname;
   $this->prenom = $Lname;
   $this->age = $Age;
   $this->role =$Role;
}

}

$person1 = new personne("salahEddine","ezzemrani",21,"etudient");
echo $person1->nom;
echo $reson1->prenom;
echo $person->age;
echo $person->role;

