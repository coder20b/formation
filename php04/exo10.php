<?php
/*
## EXO10

    (UN PEU PLUS COMPLIQUE...)
    CREER UN FICHIER PAR EXERCICE
    exo10.php

    CREER UN DAMIER
    CREER UNE FONCTION QUI AFFICHE UN DAMIER CARRE

    EN PARAMETRE ON DONNE LE NOMBRE DE CASES PAR COTE
    ET ON DOIT AFFICHER UN DAMIER

    EXEMPLE:
    creerDamier(3);

    XOX
    OXO
    XOX

    creerDamier(4);

    XOXO
    OXOX
    XOXO
    OXOX

    creerDamier(5);

    XOXOX
    OXOXO
    XOXOX
    OXOXO
    XOXOX


*/


function creerDamier ($longueur)
{
    $sizeDamier = ($longueur * $longueur);
    $tab = [ "X", "O" ];    // INDICE 0 => "X" ET INDICE 1 => "O"
    $case = 0;
    for($i=0; $i < $sizeDamier; $i++)
    {
        if ($i % $longueur == 0) {
            // retour à la ligne
            echo "\n";
            // case fantome
            if ($longueur % 2 == 0)
                $case++;    // DECALAGE DE 1
        }
        $case = ($case+1) % 2; // 0 ou 1
        echo $tab[$case];
    }
}

creerDamier(5);
echo "\n";
creerDamier(6);

?>


<!--
<table border="1" height="600" width="600">
   <?php
    $ligne = 4;
    $colonne = 4;
    for ($i = 0; $i < $ligne; $i++) {
      echo '<tr>';
      for ($j = 0; $j < $colonne; $j++) {
        if (($j + $i) % 2 == 0)
          echo '<td><center>X</center></td>';
        else
          echo '<td bgcolor="green"><center>O</center></td>';
      }

      echo '</tr>';
    }

    ?>
 </table>
-->








