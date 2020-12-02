
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
<?php require_once "php/controller/traitement-newsletter.php" ?>            
        </div>
    </form>
</section>

<section>
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
            <?php require_once "php/controller/traitement-delete.php" ?>
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
<?php require_once "php/controller/traitement-newsletter-update.php" ?>            
        </div>
    </form>
</section>

<section>
    <h3>READ (etape 2)</h3>
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
    echo "</tr>";

}


?>
        </tbody>
    </table>    
</section>