
<section>
    <h3>CREEZ VOTRE COMPTE</h3>
    <!-- POUR UPLOAD IL FAUDRA AJOUTER UN ATTRIBUT SUPPLEMENTAIRE... -->
    <!-- https://www.w3schools.com/php/php_file_upload.asp -->
    <form method="POST" action="#form-create" id="form-create" enctype="multipart/form-data">
        <label>
            <span>pseudo</span>
            <input type="text" name="pseudo" required placeholder="pseudo" maxlength="160">
        </label>
        <label>
            <span>email</span>
            <input type="email" name="email" required placeholder="email" maxlength="160">
        </label>
        <label>
            <span>motDePasse</span>
            <input type="password" name="motDePasse" required placeholder="motDePasse" maxlength="160">
        </label>
        <button type="submit">CREER VOTRE COMPTE</button>
        <!-- PARTIE TECHNIQUE -->
        <input type="hidden" name="formIdentifiant" value="user">
        <div>
<?php require_once "php/controller/traitement-user.php" ?>
        </div>
    </form>
</section>
