<?php

class View
{
    // AFFICHE UNE GALERIE D'IMAGES
    static function afficherGalerie ($chemin)
    {
        // LA FONCTION glob CONSTRUIT LE TABLEAU POUR MOI
        // $image = glob("./assets/img/*.jpg");
        // https://www.php.net/manual/fr/function.glob.php
        $image = glob($chemin, GLOB_BRACE);

        foreach($image as $compteur => $element)
        {
            echo 
            <<<x
            <img src="$element" alt="$element">

            x;
        }

    }

    // DEFINITION 
    static function afficherArticle ()
    {
        // article.php?id=3
        $id = $_GET["id"] ?? 0; // ON RECUPERE id PAR LE PARAMETRE GET
        /*
        // AVEC isset
        if (isset($_GET["id"])) // SI DANS LE TABLEAU $_GET IL Y A UNE CLE "id" AVEC UNE VALEUR
            $id = $_GET["id"]
        else
            $id = 0;
        */
        
        // SECURITE: ON CONVERTIT EN ENTIER
        // https://www.php.net/manual/fr/function.intval.php
        $id = intval($id);

        $tabLigne = lireLigne("article", "id", $id);

        foreach($tabLigne as $ligneAsso)
        {
            extract($ligneAsso);

            echo
            <<<codehtml
            
            <article>
                <h3><a href="article.php?id=$id">$titre</a></h3>
                <img src="$image" alt="article1">
                <p>$contenu</p>
                <p>publié le $datePublication</p>
            </article>

            codehtml;
        }

    }

    static function afficherArticles() 
    {
        // ON VA STOCKER LES INFOS DES ARTICLES DANS UNE TABLE SQL
        //  TOUJOURS LA DATABASE blog
        // CREER UNE TABLE SQL  article
        //  COMME COLONNES
        //      id                  INT             INDEX=primary   A_I (AUTO_INCREMENT)
        //      titre               VARCHAR(160)
        //      image               VARCHAR(160)
        //      contenu             TEXT
        //      datePublication     DATETIME
        //      ... 
        // ET AJOUTER QUELQUES LIGNES POUR LES ARTICLES... 

        // AJOUTER LE CODE PHP
        // RECUPERER LA LISTE DES ARTICLES
        // CREER LE CODE HTML POUR CHAQUE ARTICLE
        // REQUETE SQL:
        // SELECT * FROM `article`
        $tabLigne = lireTable("article", "datePublication DESC");

        // QUAND ON A UN TABLEAU ET ON VEUT TOUS LES ELEMENTS
        // => ON FAIT UNE BOUCLE
        foreach($tabLigne as $ligneAsso)
        {
            /*
            $titre = $ligneAsso["titre"];
            $image = $ligneAsso["image"];
            $contenu = $ligneAsso["contenu"];
            $datePublication = $ligneAsso["datePublication"];
            */
            // RACCOURCI SYMPA ;-p
            // https://www.php.net/manual/fr/function.extract.php
            // (ASTUCE: DONNER DES NOMS DE COLONNES SQL EN camelCase...)
            extract($ligneAsso);

            // ON CHANGE LE DOSSIER /upload/ EN /mini/ DANS LE CHEMIN
            $imageMini = str_replace("/upload/", "/mini/", $image);

            // ON AFFICHE LE CODE HTML
            echo
            <<<codehtml
            
            <article>
                <h3><a href="article.php?id=$id">$titre</a></h3>
                <img src="$imageMini" alt="article1">
                <p>$contenu</p>
                <p>publié le $datePublication</p>
            </article>

            codehtml;
        }
    }


}

