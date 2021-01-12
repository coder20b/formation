<?php

trait SectionIndex
{
    static function sectionIndex ()
    {
?>


<section>
    <h3>Affichage des annonces avec user</h3>
<?php
// ON VEUT AFFICHER LES ANNONCES ET AVOIR POUR CHAQUE ANNONCE LES INFOS SUR LE user
// https://sql.sh/cours/jointures
/*

SELECT *
FROM A
INNER JOIN B ON A.key = B.key

-- LEFT JOIN => ON VEUT TOUTES LES ANNONCES MEME SI AUCUN user N'EST ASSOCIE
SELECT *
FROM annonce
LEFT JOIN user ON annonce.user_id = user.id

-- INNER JOIN => ON VEUT SEULEMENT LES ANNONCES QUI ONT UN user ASSOCIE
SELECT *
FROM annonce
INNER JOIN user ON annonce.user_id = user.id


*/
// REQUETE AVEC JOINTURE
$requeteSQL =
<<<x

SELECT *, annonce.id as annonce_id
FROM annonce
INNER JOIN user ON annonce.user_id = user.id

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
            <h5>publié par $pseudo ($email)</h5>
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
    <h3>Affichage ADMIN pmour détecter les annonces sans user</h3>
<?php
// ON VEUT AFFICHER LES ANNONCES ET AVOIR POUR CHAQUE ANNONCE LES INFOS SUR LE user
// https://sql.sh/cours/jointures
/*


-- LEFT JOIN => ON VEUT SEULEMENT LES ANNONCES SANS user ASSOCIE
SELECT *
FROM annonce
LEFT JOIN user ON annonce.user_id = user.id
WHERE user.id is NULL

*/
// REQUETE AVEC JOINTURE
$requeteSQL =
<<<x

SELECT *
FROM annonce
LEFT JOIN user ON annonce.user_id = user.id
WHERE user.id is NULL

x;

$tabToken = [];

$pdoStatement = Model::envoyerRequeteSql($requeteSQL, $tabToken);
$tabLigne = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
print_r($tabLigne);
echo "</pre>";

?>
</section>

<?php
    }    
}