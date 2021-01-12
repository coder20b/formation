# formation

Formation Dev Fullstack (Front + Back)

Stack = Pile
=> Pile des technologies mises en oeuvre sur un projet
=> HTML, CSS, JS, PHP, SQL  => FullStack
=> HTML + CSS + JS          => Front
=> PHP + SQL                => Back

## github

    Repository Github:

https://github.com/coder20b/formation

## liveshare

    mardi 12/01

https://prod.liveshare.vsengsaas.visualstudio.com/join?21DBB130E70BD11576A3E7575B4B71C31C89

## Questions ??

## ACTIVITES DU JOUR


MARDI MATIN     SYMFONY
MARDI APREM     REVISION EXAM
MERCREDI        EXAM
JEUDI           LH
VENDREDI        LH

MARDI PROCHAIN  NICOLAS

## SYMFONY ET SESSION

    LES SESSIONS SERVENT A MEMORISER DES INFOS SUR UN VISITEUR COTE SERVEUR
    (NOTE: SE POSER LA QUESTION SI ON POURRAIT UTILISER DES SESSIONS COTE FRONT AVEC sessionStorage...)
    https://symfony.com/doc/current/session.html

    * EN TRAIN DE DEVENIR PLUS POPULAIRE POUR REMPLACER LES SESSIONS COTE SERVEUR
        => JSON Web Tokens  (INFOS COTE SERVEUR MAIS AVEC GARANTIE DE NON MODIFICATION...)
            https://jwt.io/

```php


<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// NE PAS OUBLIER DE RAJOUTER LES use POUR LES CLASSES
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Contact;
use App\Form\ContactType;

// POUR AFFICHER LA LISTE DES ANNONCES
use App\Repository\AnnonceRepository;

// POUR UTILISER UNE SESSION
use Symfony\Component\HttpFoundation\Session\SessionInterface;

// POUR UTILISER TWIG ON CREE UN HERITAGE DE CLASSE 
// AVEC LA CLASSE PARENTE AbstractController
class VitrineController extends AbstractController
{
    // ON RAJOUTE UNE PROPRIETE POUR UTILISER LES SESSIONS
    private $session;

    public function __construct(SessionInterface $session)
    {
        // ON MEMORISE LA SESSION DANS LA PROPRIETE
        $this->session = $session;
    }

    /**
     * @Route("/", name="accueil")
     */    
    function accueil ()
    {
        // ON A BESOIN D'UTILISER UNE SESSION ICI... 
        // https://symfony.com/doc/current/session.html
        $this->session->set('info1', 'coucou');     // ON MEMORISE UNE INFO ICI

        // DEV2 AJOUTE SON CODE...
        return $this->render("vitrine/index.html.twig");
    }

    /**
     * @Route("/ma-galerie", name="galerie")
     */    
    function galerie ()
    {
        // ICI ON PEUT RETROUVER LES INFOS DE SESSION
        $info1 = $this->session->get('info1');

        return $this->render("vitrine/galerie.html.twig", [
            // JE TRANSMETS LA VARIABLE A TWIG POUR AFFICHAGE
           "info1"  => $info1, 
        ]);
    }

    // ...
}

```










