<section>
    <h2>INSCRIPTION A LA NEWSLETTER</h2>
    <!-- ASTUCE UTILISER UNE ANCRE POUR RAMENER L'AFFICHAGE SUR LE FORMULAIRE -->
    <p>nous vous invitons à vous inscrire à notre newsletter</p>
    <form method="POST" action="#form-newsletter" id="form-newsletter" >
        <label>
            <div>votre email</div>
            <input type="email" name="email" required placeholder="votre email">
        </label>
        <label>
            <div>votre nom</div>
            <input type="text" name="nom" required placeholder="votre nom">
        </label>
        <button type="submit">INSCRIVEZ MOI</button>
        <div>
            <?php require_once "php/controller/traitement-newsletter.php" ?>
        </div>
    </form>
</section>

<section>
    <h2>TITRE DE LA SECTION ACCUEIL</h2>
    <article>
        <h3>TITRE ARTICLE1</h3>
        <img class="img__first" src="./assets/img/article1.jpg" alt="article1">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis dolor iste illo similique nesciunt sunt aspernatur, excepturi, quos officia, cumque tenetur vel possimus! Dolores, ut placeat! Ab a quisquam quis?</p>
    </article>
</section>