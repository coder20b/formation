<?php

class User
{
    // DEBUT DE LA CLASSE

    // PROPRIETES
    // ...
    protected $pseudo = ""; // BLOQUE LES ACCES EXTERIEURS A LA CLASSE
    protected $email  = "";

    // METHODE CONSTRUCTEUR
    function __construct($pseudo, $email)
    {
        $this->pseudo   = $pseudo;    // OK CAR ON EST DANS LA CLASSE
        $this->email    = $email;
    }

    // GETTERS (UN PAR PROPRIETE...)
    public function getPseudo ()
    {
        // ICI ON POURRAIT RAJOUTER DE LA SECURITE
        // ...
        // if ($accesOK) return $this->pseudo;

        return $this->pseudo;   // OK CAR ON EST DANS LA CLASSE
    }

    // SETTERS (UNE PAR PROPRIETE...)
    public function setEmail ($nouvelleValeur)
    {
        // ICI ON POURRAIT RAJOUTER DE LA SECURITE
        // ...
        // if ($accesOK) return $this->email = $nouvelleValeur;

        $this->email = $nouvelleValeur;     // OK CAR ON EST DANS LA CLASSE
    }

    // FIN DE LA CLASSE
}

// EXTERIEUR A LA CLASSE
$admin = new User("admin", "hello@mail.me");    // INITIALISATION DES VALEURS

// $admin->email = "hello@mail.me";   // ERREUR CAR protected

echo "<hr>";

// LECTURE
// SI ON AFFICHER LE PSEUDO ??
// echo $admin->pseudo;
// Fatal error: Uncaught Error: Cannot access protected property User::$pseudo
echo $admin->getPseudo();       // OK CAR public

echo "<hr>";

// ECRITURE
// SI ON VAUT CHANGER UNE VALEUR D'UNE PROPRIETE
// $admin->email = "nouveau@mail.me";  // ERREUR CAR protected
// Fatal error: Uncaught Error: Cannot access protected property User::$email 
$admin->setEmail("nouveau@mail.me");








