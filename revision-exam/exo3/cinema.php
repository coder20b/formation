<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            display: flex;
            flex-direction: column;
        }

        form label span {
            display: block;
        }
    </style>
</head>

<body>
    <header>
        <h1>EXO3 MOVIES</h1>
    </header>
    <main>
        <section>
            <h2>Add a new movie</h2>
            <form action="" method="POST">
                <label>
                    <span>title</span>
                    <input type="text" name="title" required placeholder="title" minlength="5">
                </label>
                <label>
                    <span>actors</span>
                    <input type="text" name="actors" required placeholder="actors" minlength="5">
                </label>
                <label>
                    <span>director</span>
                    <input type="text" name="director" required placeholder="director" minlength="5">
                </label>
                <label>
                    <span>producer</span>
                    <input type="text" name="producer" required placeholder="producer" minlength="5">
                </label>
                <label>
                    <span>year of prod</span>
                    <select name="year_of_prod" required>
                        <option value="2020">years 2020</option>
                        <option value="2010">years 2010</option>
                        <option value="2000">years 2000</option>
                        <option value="1990">years 1990</option>
                        <option value="1980">years 1980</option>
                    </select>
                </label>
                <label>
                    <span>language</span>
                    <select name="language" required>
                        <option value="fr">french</option>
                        <option value="en">english</option>
                        <option value="es">spanish</option>
                    </select>
                </label>
                <label>
                    <span>category</span>
                    <select name="category" required>
                        <option value="drama">drama</option>
                        <option value="humor">humor</option>
                        <option value="horror">horror</option>
                    </select>
                </label>
                <label>
                    <span>storyline</span>
                    <textarea name="storyline" required placeholder="storyline" cols="80" rows="5" minlength="5"></textarea>
                </label>
                <label>
                    <span>video</span>
                    <input type="url" name="video" required placeholder="video">
                </label>
                <button type="submit">Add a new movie</button>
                <!-- CHAMP TECHNIQUE POUR DIFFERENCIER LES FORMULAIRES -->
                <input type="hidden" name="formIdentifiant" value="movies">

            </form>
        </section>

        <section>
            <h3>TRAITEMENT DU FORMULAIRE CREATE</h3>
<?php 
require_once "php/controller/fonctions.php"; 
// ATTENTION: NE PAS OUBLIER DE CHANGER LES INFOS DE CONNEXION A MySQL
require_once "php/model/fonctions-sql.php"; 

require_once "php/controller/traitement-movies.php"; 

?>
        </section>
    </main>
    <footer>
        <p>tous droits réservés</p>
    </footer>
</body>

</html>