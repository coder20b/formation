<?php

// ON PEUT RECUPERER L'INFO TRANSMISE EN GET PAR fetch
$template = $_GET["template"] ?? "";

ob_start(); // DETOURNE L'AFFICHAGE

if ($template != "")
{
    $fichierTemplate = "php/view/$template.php";
    if (is_file($fichierTemplate)) {
        require_once "$fichierTemplate";
    }
}

$codeTemplate = ob_get_clean();     // GARDE LE CONTENU DU TEMPLATE DANS UNE VARIABLE

$date = date("H:i:s");

// JSON => TEXTE AU FORMAT D'UN CODE JS POUR UN OBJET
// AVEC PHP
// UN TABLEAU ASSOCIATIF EST TRES PROCHE D'UN OBJET JS
$tabAsso = [
    "cle"       => "valeur",
    "date"      => $date,
    "template"  => $codeTemplate,
];

// CONVERSION D'UN TABLEAU ASSOCIATIF EN CODE JSON
// https://www.php.net/manual/fr/function.json-encode.php
$codeJSON = json_encode($tabAsso, JSON_PRETTY_PRINT);

echo $codeJSON;







