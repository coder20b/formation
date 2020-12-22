<?php
// src/Controller/LuckyController.php
namespace App\Controller;
// => namespace BOITES POUR RANGER LES CLASSES

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
// => LA CLASSE LuckyController VA UTILISER LES CLASSE Response ET Route
//      ET ON DONNE LES NAMESPACES OU SONT RANGES CHAQUE CLASSE
//      (un peu comme les require_once pour charger le code des fonctions avant de les appeler...)

// DANS LA CLASSE, ON PEUT RANGER PLUSIEURS METHODES
// => ON PEUT AUSSI RANGER PLUSIEURS ROUTES DANS LA MEME CLASSE

class LuckyController
{

    /**
     * @Route("/lucky/number")
     */    
    function number()
    {
        $number = random_int(0, 100);

        // ON CONSTRUIT UN OBJET DE LA CLASSE Response
        // ET ON PASSE UN PARAMETRE A LA METHODE MAGIQUE CONSTRUCTEUR
        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }


}
