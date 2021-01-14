<?php

// ON VA SE CONNECTER A LA DATABASE blog
// ET ON VA RECUPERER LA LISTE DES ARTICLES DANS LA TABLE article
// CODE RAPIDE (CE QU'ON A FAIT CES DERNIERES SEMAINES...)
$connexion = new PDO("mysql:host=localhost;port=3306;dbname=blog;charset=utf8", "root", "");
$requete = $connexion->query("SELECT * FROM article ORDER BY datePublication DESC");
$tabLigne = $requete->fetchAll(PDO::FETCH_ASSOC);

// debug
// echo "<pre>";
// print_r($tabLigne);
// echo "</pre>";


$date = date("H:i:s");

// JSON => TEXTE AU FORMAT D'UN CODE JS POUR UN OBJET
// AVEC PHP
// UN TABLEAU ASSOCIATIF EST TRES PROCHE D'UN OBJET JS
$tabAsso = [
    "cle"       => "valeur",
    "date"      => $date,
    "articles"  => $tabLigne,       // ON INSERE LA LISTE DES ARTICLES DANS LA REPONSE AJAX
];

// CONVERSION D'UN TABLEAU ASSOCIATIF EN CODE JSON
// https://www.php.net/manual/fr/function.json-encode.php
$codeJSON = json_encode($tabAsso, JSON_PRETTY_PRINT);

echo $codeJSON;
