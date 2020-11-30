
<section>
    <h2>ADMIN ARTICLE</h2>
</section>

<section>
    <h3>CREATE article</h3>
    <!-- POUR UPLOAD IL FAUDRA AJOUTER UN ATTRIBUT SUPPLEMENTAIRE... -->
    <form method="POST" action="#form-create" id="form-create">
        <label>
            <span>titre</span>
            <input type="text" name="titre" required placeholder="titre" maxlength="160">
        </label>
        <label>
            <span>image</span>
            <input type="text" name="image" required placeholder="url de l'image" maxlength="160">
        </label>
        <label>
            <span>contenu</span>
            <textarea name="contenu" cols="80" rows="10" required placeholder="contenu"></textarea>
        </label>
        <button type="submit">PUBLIER VOTRE ARTICLE</button>
        <!-- PARTIE TECHNIQUE -->
        <input type="hidden" name="formIdentifiant" value="article">
        <div>
            <?php require_once "php/controller/traitement-article.php" ?>
        </div>
    </form>
</section>