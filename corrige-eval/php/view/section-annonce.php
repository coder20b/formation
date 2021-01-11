
<style>
    .reserve {
        background-color: orange;
    }
    .libre {
        background-color: greenyellow;
    }
</style>

<section>
    <h2>AFFICHAGE D'UNE SEULE ANNONCE</h2>
    <?php

// ON RECUPERE LE PARAMETRE GET TRANSMIS DANS L'URL
$id = intval($_GET["id"] ?? 0);

$tabLigne = Model::lireLigne("advert", "id", $id, "id DESC");
foreach($tabLigne as $ligneAsso)
{
    extract($ligneAsso);
    // => CREE LES VARIABLES AVEC LE NOM DE COLONNE SQL
    $title = strtoupper($title);    // PASSAGE EN MAJUSCULES

    $reserve = "libre";
    if ($reservation_message != "")
    {
        $reserve = "reserve";
    }

    echo 
    <<<x
    <article class="$reserve">
        <h3 style="text-transform:uppercase">$type : $title ($id) ($reserve)</h3>
        <h3><a href="annonce.php?id=$id">consulter l'annonce $id</a></h3>
        <h3>$price euros</h3>
        <p>$description</p>
        <p>$postal_code / $city</p>
        <p>$reservation_message</p>
    </article>
    x;
}
?>

</section>

<section>
    <h3>FORMULAIRE DE RESERVATION</h3>
    <form action="" method="POST">
        <label>
            <span>message</span>
            <textarea name="reservation_message" cols="80" rows="5" required placeholder="votre message"></textarea>
        </label>
        <button type="submit">réserver cette annonce</button>
        <!-- PARTIE TECHNIQUE -->
        <input type="hidden" name="id" value="<?php echo $id ?>" required placeholder="id" maxlength="160">
        <input type="hidden" name="formIdentifiant" value="advert-update">
        <div>
            <?php require_once "php/controller/traitement-advert.php" ?>
        </div>

    </form>
</section>











