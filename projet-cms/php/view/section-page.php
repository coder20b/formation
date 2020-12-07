
<section>
    <h3>TEMPLATE POUR AFFICHER UNE PAGE</h3>

</section>

<section>
    <h3><?php echo $titre ?? "titre par défaut" ?></h3>
    <p><?php echo $contenu ?? "contenu par défaut" ?></p>
    <img src="<?php echo $image ?? "assets/img/article1.jpg" ?>" alt="">
</section>