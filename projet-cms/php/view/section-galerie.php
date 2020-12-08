
<section>
    <h2>PAGE GALERIE</h2>
    <div class="galerie">
    <?php
// ON VA SELECTIONNER DANS LA TABLE page
// LES LIGNES QUI ONT LA categorie = 'blog'
// ET ON VA LES AFFICHER DANS UNE LISTE D'ARTICLE
$tabLigne = lireLigne("page", "categorie", "galerie", "datePublication DESC");
foreach($tabLigne as $ligneAsso)
{
    extract($ligneAsso);
    $imageMini = str_replace("/upload/", "/mini/", $image);
    echo 
    <<<x
    <img src="$imageMini" data-big="$image" alt="$titre">

    x;
}
?>
    </div>

</section>


<!-- CONTAINER POUR LA LIGHTBOX -->
<div class="lightbox">
    <img id="grand" src="assets/img/galerie-1.jpg" alt="">
</div>

<script>
// JE VEUX AJOUTER UNE ACTION SUR TOUTES LES MINIATURES .galerie img
// JE VEUX ACTIVER DU CODE JS
let lightbox = document.querySelector('.lightbox');
let listeMini = document.querySelectorAll('.galerie img');
// console.log(listeMini);
for(let indice=0; indice<listeMini.length; indice++)
{
    let mini = listeMini[indice];
    // console.log(mini);
    mini.addEventListener('click', function(event) {
        // console.log('TU AS CLIQUE SUR...');
        // console.log(event.target);

        // JE VEUX CHANGER L'IMAGE EN GRAND PAR L'IMAGE SUR LAQUELLE JE VIENS DE CLIQUER
        // ASTUCE TRES VIEILLE: SI ON DONNE UN id A UNE BALISE, EN JS IL Y A UNE VARIABLE AVEC LE MEME NOM QUE L'ID
        // console.log(grand);
        // POUR CHANGER L'IMAGE JE MODIFIE L'ATTRIBUT src
        grand.src = mini.src;

        // IL FAUT AJOUTER LA CLASSE .active SUR LA LIGHTBOX POUR LA VOIR DANS L'ECRAN
        lightbox.classList.add('active');
    });
}

// AVEC LA LIGHTBOX, IL FAUT POUVOIR LA CACHER QUAND ON CLIQUE DESSUS
lightbox.addEventListener('click', function(){
    lightbox.classList.remove('active');
});
</script>
