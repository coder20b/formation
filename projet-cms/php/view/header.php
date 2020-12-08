<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet CMS</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <div>PROJET CMS</div>
        <nav>
        <?php
// ON VA SELECTIONNER DANS LA TABLE page
// LES LIGNES QUI ONT LA categorie = 'blog'
// ET ON VA LES AFFICHER DANS UNE LISTE D'ARTICLE
$tabLigne = lireLigne("page", "categorie", "menu-principal", "datePublication ASC");
foreach($tabLigne as $ligneAsso)
{
    extract($ligneAsso);
    $imageMini = str_replace("/upload/", "/mini/", $image);
    echo 
    <<<x
    <a href="$url">$titre</a>

    x;
}
?>
        </nav>
    </header>
    <main>
