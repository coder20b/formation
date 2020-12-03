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
        table {
            width:100%;
        }
        td {
            border: 1px solid #cccccc;
        }
    </style>
</head>

<body>
    <header>
        <h1>EXO3 MOVIES</h1>
    </header>
    <main>
        <section>
            <h3>READ SOUS FORME TABLE HTML</h3>
<?php 
// ATTENTION: NE PAS OUBLIER DE CHANGER LES INFOS DE CONNEXION A MySQL
require_once "php/model/fonctions-sql.php"; 

?>
        <table>
            <thead>
                <tr>
                    <td>title</td>
                    <td>director</td>
                    <td>year_of_prod</td>
                    <td>link</td>
                </tr>
            </thead>
            <tbody>
<?php
// RECUPERER LA LISTE DE SQL
$listMovies = lireTable("movies", "id DESC");
foreach($listMovies as $ligneAsso)
{
    extract($ligneAsso);    // ASTUCE: extract CREE LES VARIABLES POUR MOI ;-p

    echo 
    <<<x
    <tr>
        <td>$title</td>
        <td>$director</td>
        <td>$year_of_prod</td>
        <td><a href="movie.php?id=$id">plus d'infos</a></td>
    </tr>
    x;

}

?>
            </tbody>
        </table>
        </section>
    </main>
    <footer>
        <p>tous droits réservés</p>
    </footer>
</body>

</html>