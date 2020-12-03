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

// RECUPERER LA LISTE DE SQL
// http://localhost:8888/formation/revision-exam/exo3/movie.php?id=2
$id = $_GET["id"] ?? 0;
$id = intval($id);  // SECURITE: CONVERTIR EN NOMBRE ENTIER
$listMovies = lireLigne("movies", "id", $id);

$nbLigne = count($listMovies);
if ($nbLigne == 0)
{
    echo "<h1>SORRY, NO MOVIE WAS FOUND...</h1>";
}
?>
        <table>
            <thead>
                <tr>
                    <td>title</td>
                    <td>director</td>
                    <td>actors</td>
                    <td>category</td>
                    <td>year_of_prod</td>
                </tr>
            </thead>
            <tbody>
<?php
foreach($listMovies as $ligneAsso)
{
    extract($ligneAsso);    // ASTUCE: extract CREE LES VARIABLES POUR MOI ;-p

    echo 
    <<<x
    <tr>
        <td>$title</td>
        <td>$director</td>
        <td>$actors</td>
        <td>$category</td>
        <td>$year_of_prod</td>
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