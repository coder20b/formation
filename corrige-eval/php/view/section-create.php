
<section>
    <h1>PAGE CREATE</h1>
    <form method="POST" action="#form-create" id="form-create" enctype="multipart/form-data">
        <label>
            <span>titre de l'annonce</span>
            <input type="text" name="title" required placeholder="titre" maxlength="160">
        </label>
        <label>
            <span>description</span>
            <textarea name="description" cols="80" rows="10" required placeholder="description"></textarea>
        </label>
        <label>
            <span>code postal</span>
            <input type="text" name="postal_code" required placeholder="code postal" maxlength="160">
        </label>
        <label>
            <span>ville</span>
            <input type="text" name="city" required placeholder="ville" maxlength="160">
        </label>
        <label>
            <span>location</span>
            <input type="radio" name="type" required value="location">
        </label>
        <label>
            <span>vente</span>
            <input type="radio" name="type" required value="vente">
        </label>
        <label>
            <span>prix</span>
            <input type="number" name="price" required placeholder="prix" maxlength="160">
        </label>
        <button type="submit">PUBLIER VOTRE ANNONCE</button>
        <!-- PARTIE TECHNIQUE -->
        <input type="hidden" name="formIdentifiant" value="advert">
        <div>
            <?php require_once "php/controller/traitement-advert.php" ?>
        </div>
    </form>

</section>


