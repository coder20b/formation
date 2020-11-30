
<section>
    <h2>ADMIN ARTICLE</h2>
</section>

<section>
    <h3>CREATE article</h3>
    <!-- POUR UPLOAD IL FAUDRA AJOUTER UN ATTRIBUT SUPPLEMENTAIRE... -->
    <form method="POST" action="#form-create" id="form-create">
        <label>
            <span>titre</span>
            <input type="text" name="titre" required placeholder="titre" maxlength="160">
        </label>
        <label>
            <span>image</span>
            <input type="text" name="image" required placeholder="url de l'image" maxlength="160">
        </label>
        <label>
            <span>contenu</span>
            <textarea name="contenu" cols="80" rows="10" required placeholder="contenu"></textarea>
        </label>
        <button type="submit">PUBLIER VOTRE ARTICLE</button>
        <!-- PARTIE TECHNIQUE -->
        <input type="hidden" name="formIdentifiant" value="article">
        <div>
            <?php require_once "php/controller/traitement-article.php" ?>
        </div>
    </form>
</section>

<section>
    <h3>DELETE article</h3>
    <form method="POST" action="#form-delete" id="form-delete">
        <label>
            <span>id</span>
            <input type="number" name="id" required placeholder="id" maxlength="160">
        </label>
        <button type="submit">SUPPRIMER VOTRE ARTICLE</button>
        <!-- PARTIE TECHNIQUE -->
        <input type="hidden" name="formIdentifiant" value="article-delete">
        <div>
            <?php require_once "php/controller/traitement-article-delete.php" ?>
        </div>
    </form>
</section>

<section>
    <h3>UPDATE article</h3>
    <!-- POUR UPLOAD IL FAUDRA AJOUTER UN ATTRIBUT SUPPLEMENTAIRE... -->
    <form method="POST" action="#form-update" id="form-update">
        <label>
            <span>titre</span>
            <input type="text" name="titre" required placeholder="titre" maxlength="160">
        </label>
        <label>
            <span>image</span>
            <input type="text" name="image" required placeholder="url de l'image" maxlength="160">
        </label>
        <label>
            <span>contenu</span>
            <textarea name="contenu" cols="80" rows="10" required placeholder="contenu"></textarea>
        </label>
        <label>
            <span>id</span>
            <input type="number" name="id" required placeholder="id" maxlength="160">
        </label>
        <button type="submit">PUBLIER VOTRE ARTICLE</button>
        <!-- PARTIE TECHNIQUE -->
        <input type="hidden" name="formIdentifiant" value="article-update">
        <div>
            <?php require_once "php/controller/traitement-article-update.php" ?>
        </div>
    </form>
</section>

<section class="blog">
    <h3>READ article</h3>
    <p>ON GARDE L'AFFICHAGE A LA FIN POUR AFFICHER LA LISTE A JOUR</p>
    <table>
        <tbody>
<?php 
// ON VEUT AFFICHER LA LISTE DES ARTICLES SOUS LA FORME D'UNE TABLE HTML
// UN LIGNE EST tr
// UNE COLONNE EST td
// <tr>
//      <td>COLONNE1</td>
//      <td>COLONNE2</td>
//      <td>COLONNE3</td>
// </tr>
function afficherTable ($table, $tri)
{
    $tabLigne = lireTable($table, $tri);
    // $tabLigne EST UN TABLEAU ORDONNE DE TABLEAUX ASSOCIATIFS
    // DEBUG
    // https://www.php.net/manual/fr/function.print-r.php
    // echo "<pre>";
    // print_r($tabLigne);
    // echo "</pre>";
    foreach($tabLigne as $ligneAsso)
    {
        echo "<tr>";
        foreach($ligneAsso as $colonne => $valeur)
        {
            echo "<td>$valeur</td>";
        }        
        echo "</tr>";
    }

}

afficherTable("article", "datePublication DESC");

?>
        </tbody>
    </table>

</section>

