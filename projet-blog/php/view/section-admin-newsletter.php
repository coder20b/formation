
<section>
    <h3>CREATE (etape 1)</h3>
    <form action="#form-create" id="form-create" method="POST">
        <label>
            <span>email</span>
            <input name="email" type="email" required placeholder="votre email">
        </label>    
        <label>
            <span>nom</span>
            <input name="nom" type="text" required placeholder="votre nom">
        </label> 
        <button type="submit">inscrivez-moi</button>   
        <!-- PARTIE TECHNIQUE -->
        <input type="hidden" name="formIdentifiant" value="newsletter">
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
            <input type="text" name="table" required placeholder="table" maxlength="160" value="newsletter">
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
    <h3>UPDATE (etape 4)</h3>
    <form action="#form-update" id="form-update" method="POST">
        <label>
            <span>email</span>
            <input name="email" type="email" required placeholder="votre email">
        </label>    
        <label>
            <span>nom</span>
            <input name="nom" type="text" required placeholder="votre nom">
        </label> 
        <label>
            <span>id</span>
            <input type="number" name="id" required placeholder="id" maxlength="160">
        </label>
        <button type="submit">modifier la ligne</button>   
        <!-- PARTIE TECHNIQUE -->
        <input type="hidden" name="formIdentifiant" value="newsletter-update">
        <div>
        </div>
    </form>
</section>

<section>
    <h3>TRAITEMENT CREATE/DELETE/UPDATE</h3>
    <div class="feedback">
<?php require_once "php/controller/traitement-newsletter.php" ?>    
    </div>
</section>

<section>
    <h3>READ A LA FIN (etape 2)</h3>
    <table>
        <tbody>
<?php
// ON VA CREER LES LIGNES tr ET LES COLONNES td EN PHP
$tabLigne = lireTable("newsletter", "dateInscription DESC");

function afficherTableSql($tabLigne)
{
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

}
afficherTableSql($tabLigne);


?>
        </tbody>
    </table>  
    
    <!-- ICI ON VA RASSEMBLER TOUS LES FORMULAIRES D'UPDATE -->
    <div>
<?php        
foreach($tabLigne as $ligneAsso)
{
    extract($ligneAsso);
    // => ASTUCE QUI CREE LES VARIABLES A PARTIR DES NOMS DE COLONNE
    // => CREE LA VARIABLE $id, $email, $nom

    // ICI ON VA CREER LE CODE HTML POUR LE FORMULAIRE D'UPDATE DE CHAQUE LIGNE
    echo
    <<<x
    <template class="template-update-$id">
        <h3>FORMULAIRE POUR LIGNE $id</h3>
        <form action="#form-update" id="form-update" method="POST">
            <label>
                <span>email</span>
                <input name="email" type="email" required placeholder="votre email" value="$email">
            </label>    
            <label>
                <span>nom</span>
                <input name="nom" type="text" required placeholder="votre nom" value="$nom">
            </label> 
            <label>
                <span>id</span>
                <input type="number" name="id" required placeholder="id" maxlength="160" value="$id">
            </label>
            <button type="submit">modifier la ligne</button>   
            <!-- PARTIE TECHNIQUE -->
            <input type="hidden" name="formIdentifiant" value="newsletter-update">
            <div>
            </div>
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
    transition: all 0.5s linear;
    left:100%;
    color:#ffffff;
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
    </script>
</section>