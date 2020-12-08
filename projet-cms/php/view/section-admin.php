
<section>
    <h3>CRUD SUR LA TABLE SQL page</h3>
</section>

<section>
    <h3>CREATE SUR LA TABLE SQL page (en premier)</h3>
    <!-- POUR UPLOAD IL FAUDRA AJOUTER UN ATTRIBUT SUPPLEMENTAIRE... -->
    <!-- https://www.w3schools.com/php/php_file_upload.asp -->
    <form method="POST" action="#form-create" id="form-create" enctype="multipart/form-data">
        <label>
            <span>url</span>
            <input type="text" name="url" required placeholder="url" maxlength="160">
        </label>
        <label>
            <span>template</span>
            <input type="text" name="template" required placeholder="template" maxlength="160">
        </label>
        <label>
            <span>titre</span>
            <input type="text" name="titre" required placeholder="titre" maxlength="160">
        </label>
        <label>
            <span>contenu</span>
            <textarea name="contenu" cols="80" rows="10" required placeholder="contenu"></textarea>
        </label>
        <label>
            <span>categorie</span>
            <input type="text" name="categorie" required placeholder="categorie" maxlength="160">
        </label>
        <label>
            <span>image</span>
            <input type="file" accept="image/*" name="image" required placeholder="url de l'image" maxlength="160" value="$image">
        </label>
        <button type="submit">PUBLIER VOTRE PAGE</button>
        <!-- PARTIE TECHNIQUE -->
        <input type="hidden" name="formIdentifiant" value="page">
        <div>
            <?php require_once "php/controller/traitement-page.php" ?>
        </div>
    </form>
</section>

<section class="">
    <h3>DELETE GENERAL (etape 3)</h3>
    <!-- ATTENTION IL FAUT PROTEGER CETTE PARTIE -->
    <!-- ON PEUT SUPPRIMER N'IMPORTE QUELLE LIGNE DANS N'IMPORTE QUELLE TABLE -->
    <h3>DELETE GENERAL</h3>
    <form method="POST" action="#form-delete" id="form-delete">
        <label>
            <span>table</span>
            <!-- NE PAS OUBLIER DE CHANGER LA VALEUR DU NOM DE LA TABLE -->
            <input type="text" name="table" required placeholder="table" maxlength="160" value="page">
        </label>
        <label>
            <span>id</span>
            <input type="number" name="id" required placeholder="id" maxlength="160">
        </label>
        <button type="submit">SUPPRIMER VOTRE LIGNE</button>
        <!-- PARTIE TECHNIQUE -->
        <input type="hidden" name="formIdentifiant" value="delete">
        <div>
        </div>
    </form>
</section>

<section>
    <h3>UPDATE SUR LA TABLE SQL page (en dernier)</h3>
</section>

<section>
    <h3>READ SUR LA TABLE SQL page (en 2e)</h3>
    <h3>(ON LE GARDE EN BAS DE PAGE POUR AVOIR AFFICHAGE A JOUR</h3>
    <h3>Il y a <?php echo Model::compterLigne("page") ?> lignes dans la table</h3>
    <table>
        <tbody>
<?php
$tabLigne = lireTable("page", "datePublication DESC");  // TABLEAU ORDONNE DE TABLEAUX ASSOCIATIFS

// $tabLigne EST UN TABLEAU ORDONNE
// QUI CONTIENT DES TABLEAUX ASSOCIATIFS
foreach($tabLigne as $ligneAsso)
{
    echo "<tr>";
    foreach($ligneAsso as $colonne => $valeur)
    {
        echo
        <<<x
            <td class="$colonne">$valeur</td>
        x;
    }
    // ON RAJOUTE UNE COLONNE POUR LE BOUTON DELETE
    $id = $ligneAsso["id"];
    echo 
    <<<x
        <td><button data-id="$id" onclick="modifierLigne(event)">modifier $id</button></td>
        <td><button data-id="$id" onclick="supprimerLigne(event)">supprimer $id</button></td>
    </tr>
    x;

}

?>
        </tbody>
    </table>
</section>
