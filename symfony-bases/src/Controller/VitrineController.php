<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// POUR UTILISER TWIG ON CREE UN HERITAGE DE CLASSE 
// AVEC LA CLASSE PARENTE AbstractController
class VitrineController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */    
    function accueil ()
    {
        return $this->render("vitrine/index.html.twig");
    }

    /**
     * @Route("/ma-galerie", name="galerie")
     */    
    function galerie ()
    {
        return $this->render("vitrine/galerie.html.twig");
    }

    /**
     * @Route("/contactez-nous", name="contact")
     */    
    function contact ()
    {
        // LA METHODE render VIENT DE LA CLASSE PARENTE AbstractController
        // ON VA CHARGER LE CODE DU TEMPLATE 
        // templates/vitrine/contact/html.twig
        // (DANS VSCODE AJOUTER UNE EXTENSION POUR LES FICHIERS .twig)
        return $this->render("vitrine/contact.html.twig");
    }

}
