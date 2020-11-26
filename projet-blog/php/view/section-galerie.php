<section>
    <h2>TITRE DE LA SECTION GALERIE</h2>

    <article>
        <h3>GALERIE PHOTO AVEC PHP</h3>
        <p>AJOUTER LE CODE PHP POUR PRODUIRE LE MEME CODE HTML</p>
        <div class="galerie">
<?php afficherGalerie("./assets/img/galerie*.{jpg,png,gif,jpeg}") ?>
        </div>
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
    </article>


</section>