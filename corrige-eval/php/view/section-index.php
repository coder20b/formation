
<section>
    <h1>PAGE ACCUEIL</h1>
<?php

$tabLigne = Model::lireTable("advert", "id DESC", 0, 15);
foreach($tabLigne as $ligneAsso)
{
    extract($ligneAsso);
    // => CREE LES VARIABLES AVEC LE NOM DE COLONNE SQL
    $title = strtoupper($title);    // PASSAGE EN MAJUSCULES

    echo 
    <<<x
    <article>
        <h3 style="text-transform:uppercase" sty>$title ($id)</h3>
    </article>
    x;
}
?>
</section>


