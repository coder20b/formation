<section>
    <h2>TITRE DE LA SECTION CONTACT</h2>
    <article>
        <h3>TITRE ARTICLE1</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis dolor iste illo similique nesciunt sunt aspernatur, excepturi, quos officia, cumque tenetur vel possimus! Dolores, ut placeat! Ab a quisquam quis?</p>
        <form action="" method="POST">
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

<?php
// DEBUG
// print_r VA AFFICHER LE CONTENU D'UN TABLEAU

echo "<h3>TABLEAU GET</h3>";
print_r($_GET);
echo "<h3>TABLEAU POST</h3>";
print_r($_POST);
echo "<h3>TABLEAU REQUEST</h3>";
print_r($_REQUEST);


?>
        </form>
        <img src="./assets/img/article1.jpg" alt="article1">
    </article>
</section>