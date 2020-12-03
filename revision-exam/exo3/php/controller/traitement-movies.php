<?php

$formIndentifiant = filtrer("formIdentifiant");

// SCENARIO CREATE

// ON N'ACTIVE LE CODE DU TRAITEMENT QUE SI L'IDENTIFIANT DU FORMULAIRE EST "newsletter"
if ($formIndentifiant == "movies") {
    $tabAsso = [
        "title"             => filtrer("title"),
        "actors"            => filtrer("actors"),
        "director"          => filtrer("director"),
        "producer"          => filtrer("producer"),
        "year_of_prod"      => filtrer("year_of_prod"),
        "language"          => filtrer("language"),
        "category"          => filtrer("category"),
        "storyline"         => filtrer("storyline"),
        "video"             => filtrer("video"),
    ];
    // ASTUCE: ON VA CREER LES VARIABLES A PARTIR DES CLES 
    extract($tabAsso);
    // CREE $title, $actors, etc...

    // ON NE FAIT LE RESTE DU CODE QUE SI LES INFOS NE SONT PAS VIDES
    if (($title != "") 
            && ($actors != "") 
            && ($director != "")
            && ($producer != "")
            && ($year_of_prod != "")
            && ($language != "")
            && ($category != "")
            && ($storyline != "")
            && ($video != "")
            ) {
        // COMPLETER LES INFOS
        // ATTENTION: NE PAS OUBLIER DE CHANGER LES INFOS DE CONNEXION A MySQL
        insererLigne("movies", $tabAsso);

        echo "<p>the movie is created</p>";
    } else {
        // SCENARIO HACK
        echo "<h1>please don't hack my website</h1>";
    }
}
