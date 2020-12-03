<?php

/*
Exercice 1 : « On se présente ! »
Créer un tableau en PHP contenant les infos suivantes :
● Prénom
● Nom
● Adresse
● Code Postal
● Ville
● Email
● Téléphone
● Date de naissance au format anglais (YYYY-MM-DD)
A l’aide d’une boucle, afficher le contenu de ce tableau (clés + valeurs) dans une liste HTML.
La date sera affichée au format français (DD/MM/YYYY).
Bonus :
Gérer l’affichage de la date de naissance à l’aide de la classe DateTime
*/

$tabAsso = [
    "prenom"        => "Georges",
    "nom"           => "Clooney",
    "adresse"       => "1 av Vieux Port",
    "codePostal"    => "13001",
    "ville"         => "Marseille",
    "email"         => "georges@me",
    "telephone"     => "0607050403",
    "dateNaissance" => "1952-02-19",
];

echo "<ul>";
foreach($tabAsso as $cle => $valeur) {
    if ($cle == "dateNaissance") {
        $dateFr = date("d-m-Y", strtotime($valeur));
        echo "<li>$cle : $dateFr</li>";    
    }
    else {
        echo "<li>$cle : $valeur</li>";
    }
}
echo "</ul>";


