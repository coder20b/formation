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

    jeudi 07/01

https://prod.liveshare.vsengsaas.visualstudio.com/join?8C7B237E03CE55476ED65AC8B15CBA1AC4F3

## Questions ??

    * COURS POO
    * CORRIGE EXAM INTER A FINIR
    * SYMFONY PLUS AVANCE
    * PROJETS EN EQUIPE
    * PROJET cms
    * ...

## COURS POO

### HERITAGE ENTRE 2 CLASSES

    * DOCUMENTATION
    https://www.php.net/manual/fr/language.oop5.inheritance.php

    LIMITATION: UNE CLASSE ENFANT NE PEUT HERITER QUE D'UN SEUL PARENT
    UNE CLASSE PARENTE PEUT AVOIR PLEIN DE CLASSES ENFANTS
    ET ON PEUT FAIRE UNE LIGNE AVEC DES PETIT-ENFANTS, etc...

    EN PRATIQUE: 
    DRY => MUTUALISER LE CODE DANS LES CLASSES PARENT POUR NE PAS LE DUPLIQUER


```php


// FRAMEWORK
class MaClasseParent
{
    // METHODES D'OBJET (SANS static)
    function afficherTitre ()
    {
        echo "<h1>titre1</h1>";
    }
}

// DEV
class MaClasseEnfant
    extends MaClasseParent
{

}

class MaClassePetitEnfant
    extends MaClasseEnfant
{

}

// DEV PEUT UTILISER LE CODE FOURNI PAR LE FRAMEWORK
$objetEnfant = new MaClasseEnfant;
$objetEnfant->afficherTitre();          // GRACE A L'HERITAGE DE CLASSE


```

### PROBLEMES ET POSSIBILITES DE L'HERITAGE

#### SURCHARGE DE METHODES (OVERRIDE)

```php

// FRAMEWORK
class MaClasseParent
{
    // METHODE MAGIQUE => CONSTRUCTEUR
    // APPELEE AUTOMATIQUEMENT PAR PHP QUAND ON FAIT new MaClasseParent
    function __construct ()
    {
        echo "<h3>constructeur MaClasseParent</h3>";
    }

    // METHODES D'OBJET (SANS static)
    function afficherTitre ()
    {
        echo "<h1>PARENT: titre1</h1>";
    }
}

// DEV
class MaClasseEnfant
    extends MaClasseParent
{
    // METHODE MAGIQUE => CONSTRUCTEUR
    // APPELEE AUTOMATIQUEMENT PAR PHP QUAND ON FAIT new MaClasseParent
    function __construct ()
    {
        echo "<h3>constructeur MaClasseEnfant</h3>";

        // SI ON VEUT QUAND MEME APPELER LE CODE DANS LA CLASSE PARENTE
        parent::__construct();
    }

    // METHODES D'OBJET (SANS static)
    function afficherTitre ()
    {
        echo "<h1>ENFANT: titre1</h1>";
    }

}

$objetEnfant = new MaClasseEnfant;      // => PRIORITE A LA METHODE DE CLASSE ENFANT
//
$objetEnfant->afficherTitre();          // => PRIORITE A LA METHODE DE CLASSE ENFANT

```

### COMBINAISON ENTRE CLASSES PLUS BIZARRES...

#### CLASSES ABSTRAITES

    * DOCUMENTATION
    https://www.php.net/manual/fr/language.oop5.abstract.php

```php

// ON PEUT DEFINIR UNE CLASSE ABSTRAITE
// => AJOUTER abstract AVANT class
// => AJOUTER DES METHODES SANS {} MAIS EN AJOUTANT abstract AVANT function 
abstract class MaClasseAbstrait
{
    // METHODES
    function afficherTitre ()
    {
        // DEV1 PEUT FOURNIR UNE PARTIE DU CODE...
    }

    // METHODE ABSTRAITE
    abstract function afficherContenu ();   // PAS DE BLOC {}
}

// ON NE PEUT PLUS FAIRE new POUR CREER UN OBJET A PARTIR DE CETTE CLASSE
$objetAbstrait = new MaClasseAbstrait;
// => ERREUR PHP



```

### INTERFACES

    DOCUMENTATION:
    https://www.php.net/manual/fr/language.oop5.interfaces.php

```php

// ON PEUT DEFINIR DES INTERFACES AVEC LE MOT interface
// => DANS UNE INTERFACE, ON NE DECLARE QUE DES METHODES ABSTRAITES
// => PERMET DE DETAILLER LE SPECIFICATIONS (SPECS...)
// => PERMET DE TRAVAILLER EN EQUIPE ENTRE PLUSIEURS DEVS
interface MonInterface
{
    // METHODES ABSTRAITES
    function afficherTitre ($titre);   // PAS DE BLOC {}

    function afficherContenu ();   // PAS DE BLOC {}

    // ...
}

// LE DEV S'EN FOUT DES INTERFACES CAR IL N'Y A PAS DE CODE DEDANS ???
// A QUOI CA SERT ?
// => UN CONTRAT QUE LE DEV S'ENGAGE A RESPECTER

class MaClasse
    implements MonInterface
{
    function afficherTitre ($titre)
    {

    }

    function afficherContenu ()
    {

    }

}

$objet = new MaClasse;  // PHP VA VERIFIER SI VOUS AVEZ AJOUTE LE CODE DE CHAQUE METHODE ABSTRAITE


```

    ON PEUT IMPLEMENTER PLUSIEURS INTERFACES
    ET COMBINER AVEC DES HERITAGES DE CLASSE...

    PAUSE ET REPRISE A 11H15

### TRAITS

    * DOCUMENTATION
    https://www.php.net/manual/fr/language.oop5.traits.php


    APPROCHE ALTERNATIVE A L'HERITAGE
    => COMPOSITION
    => QUAND ON A LE CHOIX, C'EST MIEUX

    ON PEUT FAIRE PLEIN DE COMBINAISONS
    => PLUS SOUPLE QUE L'HERITAGE
    => MAIS OUVRE DES SCENARIOS PROBLEMATIQUES 
        (ATTENTION A NE PAS TOMBER DANS CES PIEGES)

```php

// DANS UN TRAIT, ON PEUT METTRE LE MEME CODE QUE DANS UNE CLASSE
trait MonTrait
{
    // PROPRIETES

    // METHODES
    function afficherTitre($texte)
    {
        echo "<h1>$texte</h1>";
    }

}

trait MonTrait2
{
    // PROPRIETES

    // METHODES
    function afficherContenu($texte)
    {
        echo "<p>$texte</p>";
    }

}

// $objet = new Montrait;  // ERREUR PHP CAR MonTrait N'EST PAS UNE CLASSE
// Fatal error: Uncaught Error: Cannot instantiate trait MonTrait

class MaClasse
{
    // COMPOSER AVEC DES TRAITS
    use MonTrait, MonTrait2;    
}

$objet = new MaClasse;
$objet->afficherTitre("coucou");    
// POSSIBLE AVEC LA COMPOSITION AVEC MonTrait
$objet->afficherContenu("ca marche aussi");    
// POSSIBLE AVEC LA COMPOSITION AVEC MonTrait2



```

## LES HORREURS DE LA POO

    TOUT PEUT COMBINER

```php


class MaClasse
    extends MaClasseParent
    implements MonInterface, MonInterface2
{
    use MonTrait;

    // PROPRIETES D'OBJET

    // METHODES D'OBJET

    // PROPRIETES DE CLASSE (AVEC static)
    // METHODES DE CLASSE (avec static)

}


```

## SYMFONY ET LES CONTRAINTES DE VALIDATION SUR LES ENTITES

    ON PEUT AJOUTER DES CONTRAINTES SUR LES ENTITES

    https://symfony.com/doc/current/validation.html#constraints

    * EMAIL
    https://symfony.com/doc/current/reference/constraints/Email.html

```php

use Symfony\Component\Validator\Constraints as Assert;

// ...

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email(
     *     message = "Cet email '{{ value }}' est invalide."
     * )     
     */
    private $email;


```

## LES FORMULAIRES

    DANS LE DOSSIER src/Form

    ON CHOISIT LES CHAMPS DE FORMULAIRES

```php


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // ICI ON DEFINIT LES CHAMPS DU FORMULAIRE
        $builder
            ->add('email')
            ->add('nom')
            ->add('message')
            // ->add('dateMessage')
        ;
    }


```

    ET IL FAUT COMPLETER LES INFOS MANQUANTES DANS LE TRAITEMENT

    src/Controller/

    EXEMPLE: LA DATE DU MESSAGE

                $contact->setDateMessage(new \DateTime());


```php
    /**
     * @Route("/contact", name="contact", methods={"GET","POST"})
     */    
    function contact (Request $request): Response
    {
        // INJECTION DE DEPENDANCE
        // => SYMFONY NOUS FOURNIT L'OBJET $request
        // => $request BOITE QUI CONTIENT LES INFOS DE FORMULAIRE ($_GET, $_POST, $_REQUEST)

        // ON CREE UN OBJET POUR STOCKER LES INFOS DU FORMULAIRE
        $contact = new Contact();

        // ON CREE LE FORMULAIRE
        $form = $this->createForm(ContactType::class, $contact);
        // ON RECUPERE LES INFOS ENVOYEES PAR LE FORMULAIRE
        $form->handleRequest($request);

        // ON VALIDE LES INFOS DU FORMULAIRE
        $messageConfirmation = "merci de remplir le formulaire";
        if ($form->isSubmitted() && $form->isValid()) {
            // IL FAUT COMPLETER LES INFOS MANQUANTES
            $contact->setDateMessage(new \DateTime());

            // SI LES INFOS SONT VALIDES
            // => ALORS ON AJOUTE UNE LIGNE DANS LA TABLE SQL
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();

            $messageConfirmation = "message bien reçu. Nous vous répondrons rapidement.";
            
            // return $this->redirectToRoute('contact_index');
        }

        // LA METHODE render VIENT DE LA CLASSE PARENTE AbstractController
        // ON VA CHARGER LE CODE DU TEMPLATE 
        // templates/vitrine/contact/html.twig
        // (DANS VSCODE AJOUTER UNE EXTENSION POUR LES FICHIERS .twig)
        return $this->render("vitrine/contact.html.twig", [
            // CLE => VARIABLE TWIG
            // VALEUR => VALEUR DE LA VARIABLE TWIG
            'info1'     => "COUCOU",
            'messageConfirmation'   => $messageConfirmation,
            'contact'   => $contact,
            'form'      => $form->createView(),
        ]);
    }

```

## TRANSMISSION DE VARIABLE ENTRE PHP ET TWIG

    DANS UN CONTROLLER, ON PEUT TRANSMETTRE DES VARIABLES A TWIG

```php

        return $this->render("vitrine/contact.html.twig", [
            // CLE => VARIABLE TWIG
            // VALEUR => VALEUR DE LA VARIABLE TWIG
            'info1'     => "COUCOU",
            'messageConfirmation'   => $messageConfirmation,
            'contact'   => $contact,
            'form'      => $form->createView(),
        ]);
    }

```

    ET DANS TWIG, POUR LES AFFICHER ON UTILISE {{ }}

```twig

{% block body %}

<section>
    <h2>MA SECTION POUR MA PAGE CONTACT</h2>
    <h3>affichage de la variable info1: {{ info1 }}</h3>
    {{ include('contact/_form.html.twig') }}
    <h4>{{ messageConfirmation }}</h4>
    <img src="{{ asset('assets/img/article3.jpg') }}" alt="article2">
</section>

{% endblock %}

```

## AUTONOMIE 

    AMELIORER LE FORMULAIRE DE CONTACT
    * AJOUTER LA VALIDATION DU CHAMP EMAIL
    * ENLEVER LE CHAMP DE DATE ET COMPLETER LA DATE LORS DU TRAITEMENT
    * AFFICHER UN MESSAGE DE CONFIRMATION

    EXERCICE:
    FAIRE LA MEME CHOSE AVEC LE FORMULAIRE DE NEWSLETTER...

    PAUSE DEJEUNER ET REPRISE A 13H45... BON APP ;-p

## QUESTIONS ??

## ACTIVITES POUR CET APRES-MIDI ??

    * AUTONOMIE INDIVIDUELLE
    * AUTONOMIE EN EQUIPE POUR LES PROJETS
    * ???

    ET ENSUITE PAUSE A 15H45...
    ET NE PAS HESITER A POSER DES QUESTIONS...










    









































