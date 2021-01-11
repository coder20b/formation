
<style>
    .reserve {
        background-color: orange;
    }
    .libre {
        background-color: greenyellow;
    }
</style>

<section>
    <h2>LISTE DE TOUTES LES ANNONCES</h2>
    <?php

$tabLigne = Model::lireTable("advert", "id DESC", 0, -1);
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
        <h3 style="text-transform:uppercase">$title ($id) ($reserve)</h3>
        <h3><a href="annonce.php?id=$id">consulter l'annonce $id</a></h3>
    </article>
    x;
}
?>

</section>