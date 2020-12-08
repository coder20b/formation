
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
        </div>
    </form>
</section>

<section class="cache">
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

<section class="cache">
    <h3>UPDATE SUR LA TABLE SQL page (en dernier)</h3>
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
        <label>
            <span>id</span>
            <input type="number" name="id" required placeholder="id" maxlength="160">
        </label>
        <button type="submit">MODIFIER VOTRE PAGE</button>
        <!-- PARTIE TECHNIQUE -->
        <input type="hidden" name="formIdentifiant" value="page-update">
    </form>
</section>

<section>
    <h3>TRAITEMENT DES FORMULAIRES CREATE/UPDATE/DELETE</h3>
    <div>
        <?php require_once "php/controller/traitement-page.php" ?>
    </div>
</section>

<section>
    <h3>READ SUR LA TABLE SQL page (en 2e)</h3>
    <p>(ON LE GARDE EN BAS DE PAGE POUR AVOIR AFFICHAGE A JOUR)</p>
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

<div>
<?php        
foreach($tabLigne as $ligneAsso)
{
    extract($ligneAsso);
    // => ASTUCE QUI CREE LES VARIABLES A PARTIR DES NOMS DE COLONNE
    // => CREE LA VARIABLE $id, $email, $nom

    // ICI ON VA CREER LE CODE HTML POUR LE FORMULAIRE D'UPDATE DE CHAQUE LIGNE
    // ET ON LE PRE-REMPLIT AVEC LES VALEURS ACTUELLES
    // https://developer.mozilla.org/fr/docs/Web/HTML/Element/template
    echo
    <<<x
    <template class="template-update-$id">
        <h3>FORMULAIRE UPDATE POUR LIGNE $id</h3>
        <form method="POST" action="#form-create" id="form-create" enctype="multipart/form-data">
            <label>
                <span>url</span>
                <input type="text" name="url" required placeholder="url" maxlength="160" value="$url">
            </label>
            <label>
                <span>template</span>
                <input type="text" name="template" required placeholder="template" maxlength="160" value="$template">
            </label>
            <label>
                <span>titre</span>
                <input type="text" name="titre" required placeholder="titre" maxlength="160" value="$titre">
            </label>
            <label>
                <span>contenu</span>
                <textarea name="contenu" cols="80" rows="10" required placeholder="contenu">$contenu</textarea>
            </label>
            <label>
                <span>categorie</span>
                <input type="text" name="categorie" required placeholder="categorie" maxlength="160" value="$categorie">
            </label>
            <label>
                <span>image</span>
                <input type="file" accept="image/*" name="image" required placeholder="url de l'image" maxlength="160" value="$image">
            </label>
            <label>
                <span>id</span>
                <input type="number" name="id" required placeholder="id" maxlength="160" value="$id">
            </label>
            <button type="submit">MODIFIER VOTRE PAGE</button>
            <!-- PARTIE TECHNIQUE -->
            <input type="hidden" name="formIdentifiant" value="page-update">
        </form>
    </template>

    x;
}
?>
    </div>


    <div id="boxUpdate">
        <button onclick="fermerBox(event)">CLIQUER ICI POUR FERMER LA LIGHTBOX</button>
        <!-- container dans lequel on va insérer le formulaire d'update -->
        <div id="boxFormUpdate"></div>
    </div>
    <style>
#boxUpdate {
    width:100%;
    height:100%;
    position:fixed;
    top:0;
    background-color: rgba(0,0,0,0.9);
    z-index:999;
    transition: all 0.3s ease-in-out;
    left:100%;
    color:#ffffff;
    overflow-y: auto;   /* POUR AFFICHER LA BARRE DE SCROLL SI LE CONTENU DEBORDE EN HAUTEUR */
}  
#boxUpdate.active {
    left:0%;

}      
    </style>

    <script>
function fermerBox (event)
{
    // POUR CACHER LA BOX, ON ENLEVE LA CLASSE active
    boxUpdate.classList.remove('active');
}


function supprimerLigne(event) 
{   
    // DEBUG
    // console.log(event.target);
    // RECUPERER id DANS L'ATTRIBUT data-id
    // COPIER id DANS LE CHAMP DU FORMULAIRE
    // SIMULER LE CLICK SUR LE BOUTON submit DU FORMULAIRE

    // https://developer.mozilla.org/fr/docs/Web/API/Element/getAttribute
    let id = event.target.getAttribute('data-id');
    // console.log(id);

    let champId = document.querySelector('#form-delete input[name=id]');
    // console.log(champId);
    champId.value = id;

    let boutonSubmit = document.querySelector('#form-delete button[type=submit]');
    // console.log(boutonSubmit);
    // https://developer.mozilla.org/fr/docs/Web/API/HTMLElement/click
    boutonSubmit.click();
}        

function modifierLigne(event)
{
    // MONTRER UNE LIGHTBOX AU DESSUS DE LA PAGE
    // DANS LA LIGHTBOX, ON VA INSERER LE FORMULAIRE D'UPDATE DE LA LIGNE

    // DEBUG
    console.log(event.target);
    let id = event.target.getAttribute('data-id');

    // AVEC id ON VA SELECTIONNER LA BALISE template QUI CONTIENT LE CODE DU FORMULAIRE
    // ET ON VA LE COPIER DANS LA BALISE #boxFormUpdate
    let selecteurTemplate = '.template-update-' + id;
    let baliseTemplate = document.querySelector(selecteurTemplate);
    boxFormUpdate.innerHTML = baliseTemplate.innerHTML;

    // ajouter la classe active sur #boxUpdate
    boxUpdate.classList.add('active');


}

</script>
