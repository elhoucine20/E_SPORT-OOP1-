<?php


//  Personne
abstract class Personne {
    protected $nom;
    protected $prenom;
    protected $age;

    public function __construct($nom, $prenom, $age) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->age = $age;
    }

    abstract public function afficherInfos();
}

//   Employe
abstract class Employe extends Personne {
    protected $salaire;
    protected $poste;

    public function __construct($nom, $prenom, $age, $salaire, $poste) {
        parent::__construct($nom, $prenom, $age);
        $this->salaire = $salaire;
        $this->poste = $poste;
    }

    public function afficherInfos() {
        echo "Nom : " . $this->nom . "\n";
        echo "Prenom : " . $this->prenom . "\n";
        echo "Age : " . $this->age . "\n";
        echo "Salaire : " . $this->salaire . "\n";
        echo "Poste : " . $this->poste . "\n";
    }
}

// كيانات
class Etudiant extends Personne {
    private $niveau;

    public function __construct($nom, $prenom, $age, $niveau) {
        parent::__construct($nom, $prenom, $age);
        $this->niveau = $niveau;
    }

    public function afficherInfos() {
        echo "Nom : " . $this->nom . "\n";
        echo "Prenom : " . $this->prenom . "\n";
        echo "Age : " . $this->age . "\n";
        echo "Niveau : " . $this->niveau . "\n";
    }
}

class Professeur extends Employe {
    private $matiere;

    public function __construct($nom, $prenom, $age, $salaire, $poste, $matiere) {
        parent::__construct($nom, $prenom, $age, $salaire, $poste);
        $this->matiere = $matiere;
    }

    public function afficherInfos() {
        parent::afficherInfos();
        echo "Matiere : " . $this->matiere . "\n";
    }
}

class Directeur extends Employe {
    private $responsabilite;

    public function __construct($nom, $prenom, $age, $salaire, $poste, $responsabilite) {
        parent::__construct($nom, $prenom, $age, $salaire, $poste);
        $this->responsabilite = $responsabilite;
    }

    public function afficherInfos() {
        parent::afficherInfos();
        echo "Responsabilite : " . $this->responsabilite . "\n";
    }
}

class Secretaire extends Employe {
    private $service;

    public function __construct($nom, $prenom, $age, $salaire, $poste, $service) {
        parent::__construct($nom, $prenom, $age, $salaire, $poste);
        $this->service = $service;
    }

    public function afficherInfos() {
        parent::afficherInfos();
        echo "Service : " . $this->service . "\n";
    }
}

class Comptable extends Employe {
    private $experience;

    public function __construct($nom, $prenom, $age, $salaire, $poste, $experience) {
        parent::__construct($nom, $prenom, $age, $salaire, $poste);
        $this->experience = $experience;
    }

    public function afficherInfos() {
        parent::afficherInfos();
        echo "Experience : " . $this->experience . "\n";
    }
}

class Gardien extends Employe {
    private $zone;

    public function __construct($nom, $prenom, $age, $salaire, $poste, $zone) {
        parent::__construct($nom, $prenom, $age, $salaire, $poste);
        $this->zone = $zone;
    }

    public function afficherInfos() {
        parent::afficherInfos();
        echo "Zone : " . $this->zone . "\n";
    }
}

// creation
$etudiant = new Etudiant("John", "Doe", 20, "Licence");
$professeur = new Professeur("Jane", "Doe", 30, 5000, "Professeur", "Mathématiques");
$directeur = new Directeur("John", "Smith", 40, 10000, "Directeur", "Gestion");
$secretaire = new Secretaire("Jane", "Smith", 25, 3000, "Secretaire", "Accueil");
$comptable = new Comptable("John", "Johnson", 35, 6000, "Comptable", 5);
$gardien = new Gardien("Jane", "Johnson", 28, 2500, "Gardien", "Zone A");

// affichage  
$etudiant->afficherInfos();
$professeur->afficherInfos();
$directeur->afficherInfos();
$secretaire->afficherInfos();
$comptable->afficherInfos();
$gardien->afficherInfos();


