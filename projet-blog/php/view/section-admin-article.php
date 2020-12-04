
<section>
    <h2>ADMIN ARTICLE</h2>
</section>

<section>
    <h3>CREATE article</h3>
    <!-- POUR UPLOAD IL FAUDRA AJOUTER UN ATTRIBUT SUPPLEMENTAIRE... -->
    <!-- https://www.w3schools.com/php/php_file_upload.asp -->
    <form method="POST" action="#form-create" id="form-create" enctype="multipart/form-data">
        <label>
            <span>titre</span>
            <input type="text" name="titre" required placeholder="titre" maxlength="160">
        </label>
        <label>
            <span>image</span>
            <input type="file" accept="image/*" name="image" required placeholder="url de l'image" maxlength="160" value="$image">
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

<section class="">
    <!-- ATTENTION IL FAUT PROTEGER CETTE PARTIE -->
    <!-- ON PEUT SUPPRIMER N'IMPORTE QUELLE LIGNE DANS N'IMPORTE QUELLE TABLE -->
    <h3>DELETE GENERAL</h3>
    <form method="POST" action="#form-delete" id="form-delete">
        <label>
            <span>table</span>
            <input type="text" name="table" required placeholder="table" maxlength="160" value="article">
        </label>
        <label>
            <span>id</span>
            <input type="number" name="id" required placeholder="id" maxlength="160">
        </label>
        <button type="submit">SUPPRIMER VOTRE LIGNE</button>
        <!-- PARTIE TECHNIQUE -->
        <input type="hidden" name="formIdentifiant" value="delete">
        <div>
            <?php require_once "php/controller/traitement-delete.php" ?>
        </div>
    </form>
</section>

<section class="cache">
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
        <button type="submit">MODIFIER VOTRE ARTICLE</button>
        <!-- PARTIE TECHNIQUE -->
        <input type="hidden" name="formIdentifiant" value="article-update">
        <div>
            <?php require_once "php/controller/traitement-article-update.php" ?>
        </div>
    </form>
</section>

<section class="blog">
    <h3>READ article</h3>
    <h3>IL Y A <?php echo Model::compterLigne("article") ?> ARTICLES EN TOUT</h3>
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
            echo 
            <<<x
            <td class="$colonne">$valeur</td>
            x;
        }  
        // AJOUTER UNE COLONNE AVEC SUPPRIMER
        // $id = $ligneAsso["id"];
        extract($ligneAsso);    // CREE MES VARIABLES
        echo 
        <<<x
        <td>
            <button class="action-update" data-id="$id">formulaire modification $id</button>
            <!-- ON CREE UN FORMULAIRE PREREMPLI POUR CHAQUE LIGNE A MODIFIER -->
            <!-- https://www.w3schools.com/php/php_file_upload.asp -->
            <form method="POST" action="#form-update" class="cache form-update-$id" enctype="multipart/form-data">
                <label>
                    <span>titre</span>
                    <input type="text" name="titre" required placeholder="titre" maxlength="160" value="$titre">
                </label>
                <label>
                    <span>image</span>
                    <input type="file" accept="image/*" name="image" required placeholder="url de l'image" maxlength="160" value="$image">
                </label>
                <label>
                    <span>contenu</span>
                    <textarea name="contenu" cols="80" rows="10" required placeholder="contenu">$contenu</textarea>
                </label>
                <label>
                    <span>id</span>
                    <input type="number" name="id" required placeholder="id" maxlength="160" value="$id">
                </label>
                <button type="submit">ENREGISTRER VOS MODIFICATIONS</button>
                <!-- PARTIE TECHNIQUE -->
                <input type="hidden" name="formIdentifiant" value="article-update">
                <div>
                </div>
            </form>
            
        </td>
        <td>
            <button class="action-delete" data-id="$id" onclick="onDeleteLine(event)">supprimer $id</button>
        </td>
        x;      
        echo "</tr>";
    }

}

afficherTable("article", "datePublication DESC");

?>
        </tbody>
    </table>
    <script>
function onDeleteLine(event) 
{
    // J'AI BESOIN DE RECUPERER LE BOUTON QUI A ETE CLIQUE
    // console.log(event.target);
    let boutonClique = event.target;
    // MAINTENANT JE VEUX RECUPERER L'ATTRIBUT data-id
    let id = boutonClique.getAttribute('data-id');
    console.log(id);

    // IL FAUT COPIER CET id DANS LE CHAMP DU FORMULAIRE DE ID #form-delete
    let champId = document.querySelector('form#form-delete input[name=id]');
    console.log(champId);
    champId.value = id; // COPIER COLLER DE id DANS LE CHAMP DU FORMULAIRE

    // ENFIN ON VA AUSSI DECLENCHER LE CLICK POUR ACTIVER LE FORMULAIRE
    let boutonSupprimer = document.querySelector('form#form-delete button[type=submit]');
    boutonSupprimer.click();
}       


// SEPARATION MVC
// ON FAIT UNE BOUCLE
let boutons = document.querySelectorAll('button.action-update');
for(bouton of boutons)
{
    bouton.addEventListener('click', function(event) {
        let boutonClique = event.target;
        console.log(boutonClique);
        // ON MONTRE LE FORMULAIRE CORRESPONDANT
        let id = boutonClique.getAttribute('data-id');
        let formUpdateAssocie = document.querySelector('.form-update-' + id);
        formUpdateAssocie.classList.toggle('cache');
    });
}

// AUTRE POSSIBILITE...
// EN PHP, ON VA CREER DU JS
/*
let articles = <?php echo json_encode(lireTable("article", "datePublication DESC"),JSON_PRETTY_PRINT)?>;
*/
    </script>
</section>

