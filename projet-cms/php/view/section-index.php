
<section>
    <h1>PAGE ACCUEIL</h1>
</section>


<section class="blog">
    <h2>MES COMPETENCES</h2>
    <?php
// ON VA SELECTIONNER DANS LA TABLE page
// LES LIGNES QUI ONT LA categorie = 'blog'
// ET ON VA LES AFFICHER DANS UNE LISTE D'ARTICLE
$tabLigne = lireLigne("page", "categorie", "competences", "datePublication ASC");
foreach($tabLigne as $ligneAsso)
{
    extract($ligneAsso);
    $imageMini = str_replace("/upload/", "/mini/", $image);
    echo 
    <<<x
    <article>
        <h3><a href="$url.php">$titre</a></h3>
        <p>$contenu</p>
        <img src="$imageMini" alt="$titre">
    </article>

    x;
}
?>

</section>


<section class="blog">
    <h2>EXPERIENCES PROFESSIONNELLES</h2>
    <?php
// ON VA SELECTIONNER DANS LA TABLE page
// LES LIGNES QUI ONT LA categorie = 'blog'
// ET ON VA LES AFFICHER DANS UNE LISTE D'ARTICLE
$tabLigne = lireLigne("page", "categorie", "experiences", "datePublication DESC");
foreach($tabLigne as $ligneAsso)
{
    extract($ligneAsso);
    $imageMini = str_replace("/upload/", "/mini/", $image);
    echo 
    <<<x
    <article>
        <img src="$imageMini" alt="$titre">
        <h3><a href="$url.php">$titre</a></h3>
        <p>$contenu</p>
    </article>

    x;
}
?>

</section>
