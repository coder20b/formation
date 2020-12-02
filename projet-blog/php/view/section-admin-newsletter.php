
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

<section>
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
    <?php require_once "php/controller/traitement-newsletter.php" ?>            
</section>

<section>
    <h3>READ A LA FIN (etape 2)</h3>
    <table>
        <tbody>
<?php
// ON VA CREER LES LIGNES tr ET LES COLONNES td EN PHP
$tabLigne = lireTable("newsletter", "dateInscription DESC");
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
        <td><button data-id="$id" onclick="supprimerLigne(event)">supprimer $id</button></td>
    </tr>
    x;

}


?>
        </tbody>
    </table>  
    
    <script>
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