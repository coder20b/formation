<?php

class Template
{
    // COMPOSITION AVEC TRAITS
    // AJOUTER LES TRAITS SUPPLEMENTAIRES...
    use AdminUser, SectionContact;

    static function header ()
    {
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet CMS</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <img class="header__img" src="./assets/img/logo.svg" alt="logo">
        <nav>
            <a href="index.php">accueil</a>
            <a href="admin-user.php">admin user</a>
            <a href="admin-annonce.php">admin annonce</a>
        </nav>
    </header>
    <main>

<?php        
    }


    static function footer ()
    {
?>

</main>
    <footer>
        <p>tous droits réservés</p>
    </footer>
    
    <script id="debugServeur" type="pasdujs">
<?php Model::afficherDebug() ?>        
    </script>
    <script>
        console.log(debugServeur.innerHTML);
    </script>
    
</body>
</html>

<?php
    }
    

}