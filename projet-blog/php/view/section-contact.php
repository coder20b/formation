<section>
    <h2>TITRE DE LA SECTION CONTACT</h2>
    <article>
        <h3>TITRE ARTICLE1</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis dolor iste illo similique nesciunt sunt aspernatur, excepturi, quos officia, cumque tenetur vel possimus! Dolores, ut placeat! Ab a quisquam quis?</p>
        <form action="#form-contact" method="POST">
            <label>
                <div>votre nom *</div>
                <input type="text" name="nom" required placeholder="VOTRE NOM">
            </label>
            <label>
                <div>votre email *</div>
                <input type="email" name="email" required placeholder="VOTRE EMAIL">
            </label>
            <label>
                <div>votre message *</div>
                <textarea name="message" cols="80" rows="10" required placeholder="VOTRE MESSAGE"></textarea>
            </label>
            <button type="submit">ENVOYER VOTRE MESSAGE</button>
            <!-- CE CHAMP RESTE CACHE AU VISITEUR -->
            <input type="hidden" name="formIdentifiant" value="contact">
            <div id="form-contact">
                <?php require_once "php/controller/traitement-contact.php" ?>
            </div>
        </form>
        <img src="./assets/img/article1.jpg" alt="article1">
    </article>
</section>