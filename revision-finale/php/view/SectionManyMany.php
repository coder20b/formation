<?php

trait SectionManyMany
{
    static function sectionManyMany ()
    {
?>


<section>
    <h3>Affichage des many-many</h3>
<?php
// ON VEUT AFFICHER LES ANNONCES ET AVOIR POUR CHAQUE ANNONCE OBTENIR LES CATEGORIES
// https://sql.sh/cours/jointures
/*

SELECT *
FROM annonce
LEFT JOIN annonce_categorie 
    ON annonce.id = annonce_categorie.annonce_id
LEFT JOIN categorie 
    ON annonce_categorie.categorie_id = categorie.id

*/
// REQUETE AVEC JOINTURE
$requeteSQL =
<<<x

SELECT *
FROM annonce
LEFT JOIN annonce_categorie 
    ON annonce.id = annonce_categorie.annonce_id
LEFT JOIN categorie 
    ON annonce_categorie.categorie_id = categorie.id

x;

$tabToken = [];

$pdoStatement = Model::envoyerRequeteSql($requeteSQL, $tabToken);
$tabLigne = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

foreach($tabLigne as $ligneAsso)
{
    extract($ligneAsso); // => CREE LES VARIABLES A PARTIR DES COLONNES
    echo
    <<<x
        <article>
            <h4>$titre</h4>
            <p>$description</p>
            <p>dans catégorie: $label</p>
            <hr>
        </article>
    x;
}

echo "<pre>";
print_r($tabLigne);
echo "</pre>";

?>
</section>

<section>
    <h4>afficher seulement les annonces dans une catégorie</h4>
    <?php
// ON VEUT AFFICHER LES ANNONCES ET AVOIR POUR CHAQUE ANNONCE OBTENIR LES CATEGORIES
// https://sql.sh/cours/jointures
/*

SELECT *
FROM annonce
LEFT JOIN annonce_categorie 
    ON annonce.id = annonce_categorie.annonce_id
LEFT JOIN categorie 
    ON annonce_categorie.categorie_id = categorie.id

*/

$recherche = $_GET['recherche'] ?? 'nourriture';

// REQUETE AVEC JOINTURE
$requeteSQL =
<<<x

SELECT *
FROM annonce
LEFT JOIN annonce_categorie 
    ON annonce.id = annonce_categorie.annonce_id
LEFT JOIN categorie 
    ON annonce_categorie.categorie_id = categorie.id
LEFT JOIN user
    ON annonce.user_id = user.id
WHERE
    categorie.label = :recherche

x;

$tabToken = [ "recherche" => $recherche ];

$pdoStatement = Model::envoyerRequeteSql($requeteSQL, $tabToken);
$tabLigne = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

foreach($tabLigne as $ligneAsso)
{
    extract($ligneAsso); // => CREE LES VARIABLES A PARTIR DES COLONNES
    echo
    <<<x
        <article>
            <h4>$titre</h4>
            <p>$description</p>
            <p>dans catégorie: $label</p>
            <p>auteur: $pseudo / $email</p>
            <hr>
        </article>
    x;
}

echo "<pre>";
print_r($tabLigne);
echo "</pre>";

?>
</section>

<?php
    }    
}