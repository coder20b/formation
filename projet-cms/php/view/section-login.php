
<section>
    <h3>FORMULAIRE DE LOGIN</h3>
    <form method="POST" action="#form-login" id="form-login" enctype="multipart/form-data">
        <label>
            <span>email</span>
            <input type="email" name="email" required placeholder="email" maxlength="160">
        </label>
        <label>
            <span>motDePasse</span>
            <input type="password" name="motDePasse" required placeholder="motDePasse" maxlength="160">
        </label>
        <button type="submit">SE CONNECTER</button>
        <!-- PARTIE TECHNIQUE -->
        <input type="hidden" name="formIdentifiant" value="user-login">
        <div>
            <?php require_once "php/controller/traitement-user.php" ?>
        </div>
    </form>
</section>