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

    lundi 11/01

https://prod.liveshare.vsengsaas.visualstudio.com/join?91FA3451F4E7D25D83CB06AA031E708B2E3B

## Questions ??

## PLANNING DE LA SEMAINE

    LUNDI       11/01
    MARDI       12/01
    MERCREDI    13/01       EXAM FINAL
    JEUDI       14/01       LONG HAI    => NORMALEMENT 1ERE JOURNEE PROJET
    VENDREDI    15/01       NICOLAS

    ET ENSUITE MODE PROJET (LH => 3 JOURS/SEMAINE...)

    LUNDI MATIN     AVANCER SUR SYMFONY
    LUNDI APREM     REVISION EXAM ET AUTONOMIE PROJET

    MARDI MATIN     AVANCER SUR SYMFONY
    MARDI APREM     REVISION EXAM ET AUTONOMIE PROJET

    EXAM FINAL POO + JOINTURES SQL

    * DERNIERES SEMAINES: DERNIERE OCCASION POUR VOIR OU REVOIR D'AUTRES SUJETS


## SYMFONY

    ESPACE MEMBRE
        UNE FOIS CONNECTE
        LE MEMBRE PEUT CREER SES ANNONCES           => CREATE
        LE MEMBRE VOIT SEULEMENT SES ANNONCES       => READ FILTRE
        LE MEMBRE PEUT SUPPRIMER SES ANNONCES       => DELETE FILTRE
        LE MEMBRE PEUT MODIFIER SES ANNONCES        => UPDATE FILTRE

    CREATION D'ANNONCE
        => AJOUTER UPLOAD D'IMAGES

## CREATION ESPACE MEMBRE

    AVEC LA COMMANDE make:controller ON CREE UN NOUVEAU CONTROLLER MemberController
    ET ENSUITE ON AJOUTE UN PREFIXE A TOUTES LES URLS DE MemberController 

```php

/**
 * @Route("/member")
 */
class MemberController extends AbstractController
{
    /**
     * @Route("/", name="member")
     */
    public function index(): Response



```

    ET ON PROTEGE LA PARTIE ESPACE MEMBRE EN AJOUTANT UNE LIGNE DANS LE FICHIER
    config/packages/security.yaml

```

        access_control:
        - { path: ^/admin, roles: ROLE_ADMIN }
        - { path: ^/member, roles: ROLE_MEMBER }

```

    ENSUITE, IL FAUT DONNER AUX UTILISATEURS LE ROLE ROLE_MEMBER
    (AVEC PHPMYADMIN...)

    A LA CREATION DE COMPTE, IL FAUDRA ACTIVER UN UTILISATEUR EN LUI AJOUTANT LE ROLE ROLE_MEMBER
    (A FAIRE...)

## CRUD SUR Annonce DANS L'ESPACE MEMBRE

    Create
    Read
    Delete
    Update

### CREATE

    AVEC LA LIGNE DE COMMANDE php bin/console make:form
    CREER UN NOUVEAU src/Form/AnnonceMemberType
    ET ENLEVER LES CHAMPS datePublication ET user

```php
<?php

namespace App\Form;

use App\Entity\Annonce;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnnonceMemberType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('url')
            ->add('description')
            ->add('photo')
            ->add('categorie')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Annonce::class,
        ]);
    }
}

```

    ET MODIFIER LE CODE DU CONTROLLER

```php

    /**
     * @Route("/", name="member", methods={"GET","POST"})
     */
    public function index(Request $request): Response
    {
        $annonce = new Annonce();

        $form = $this->createForm(AnnonceMemberType::class, $annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userConnecte = $this->getUser();                   // METHODE GETTER DU CONTROLLER POUR RECUPERER LE USER CONNECTE
            // DEBUG => AFFICHE LE CONTENU DES VARIABLES DANS LE PROFILER (BANDEAU EN BAS DE PAGE...)
            dump($userConnecte);

            // COMPLETER LES INFOS MANQUANTES
            $annonce->setDatePublication(new \DateTime());      // DATE D'ENREGISTREMENT DE L'ANNONCE
            $annonce->setUser($userConnecte);                   // ON ENREGISTRE L'ANNONCE AVEC COMME AUTEUR L'UTILISATEUR CONNECTE

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($annonce);
            $entityManager->flush();

            // DESACTIVER LA REDIRECTION POUR RESTER SUR LA MEME PAGE
            // return $this->redirectToRoute('annonce_index');
        }

        return $this->render('member/index.html.twig', [
            'annonce' => $annonce,
            'form' => $form->createView(),
        ]);
    }

```

    ET MODIFIER LE FICHIER TEMPLATE templates/member/index.html.twig

```

{% extends 'base.html.twig' %}

{% block title %}Espace Membre{% endblock %}

{% block body %}

<section>
    <h2>formulaire de creation d'annonces</h2>

    {{ include('annonce/_form.html.twig') }}

</section>

{% endblock %}

```

    PAUSE ET REPRISE A 11H05

### READ DANS ESPACE MEMBRE

    SUR LA MEME PAGE, ON AJOUTE L'AFFICHAGE DES ANNONCES DE L'UTILISATEUR CONNECTE

```php

    /**
     * @Route("/", name="member", methods={"GET","POST"})
     */
    public function index(Request $request, AnnonceRepository $annonceRepository): Response
    {
        $annonce = new Annonce();

        $form = $this->createForm(AnnonceMemberType::class, $annonce);
        $form->handleRequest($request);

        // METHODE GETTER DU CONTROLLER POUR RECUPERER LE USER CONNECTE
        $userConnecte = $this->getUser();                   
        // DEBUG => AFFICHE LE CONTENU DES VARIABLES DANS LE PROFILER (BANDEAU EN BAS DE PAGE...)
        dump($userConnecte);

        if ($form->isSubmitted() && $form->isValid()) {

            // COMPLETER LES INFOS MANQUANTES
            $annonce->setDatePublication(new \DateTime());      // DATE D'ENREGISTREMENT DE L'ANNONCE
            $annonce->setUser($userConnecte);                   // ON ENREGISTRE L'ANNONCE AVEC COMME AUTEUR L'UTILISATEUR CONNECTE

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($annonce);
            $entityManager->flush();

            // DESACTIVER LA REDIRECTION POUR RESTER SUR LA MEME PAGE
            // return $this->redirectToRoute('annonce_index');
        }


        // FILTRE POUR CLAUSE WHERE POUR SEULEMENT AFFICHER LES ANNONCES DE L'UTILISATEUR CONNECTE
        $listeAnnonce = $annonceRepository->findBy(
            [ "user"  => $userConnecte],            
            [ "datePublication" => "DESC" ]
        );

        return $this->render('member/index.html.twig', [
            'annonce'   => $annonce,
            'form'      => $form->createView(),
            'annonces'  => $listeAnnonce,
        ]);
    }

```

    ET POUR LE TEMPLATE, ON REPREND LE CODE 

```twig

{% extends 'base.html.twig' %}

{% block title %}Espace Membre{% endblock %}

{% block body %}

<section>
    <h2>formulaire de creation d'annonces</h2>

    {{ include('annonce/_form.html.twig') }}

</section>

<section>
    <h2>affichage de la liste des annonces</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Titre</th>
                <th>Url</th>
                <th>Description</th>
                <th>Photo</th>
                <th>Categorie</th>
                <th>DatePublication</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
        {% for annonce in annonces %}
            <tr>
                <td>{{ annonce.id }}</td>
                <td>{{ annonce.titre }}</td>
                <td>{{ annonce.url }}</td>
                <td>{{ annonce.description }}</td>
                <td>{{ annonce.photo }}</td>
                <td>{{ annonce.categorie }}</td>
                <td>{{ annonce.datePublication ? annonce.datePublication|date('Y-m-d H:i:s') : '' }}</td>
                <td>
                    <a href="{{ path('annonce_show', {'id': annonce.id}) }}">show</a>
                    <a href="{{ path('annonce_edit', {'id': annonce.id}) }}">edit</a>
                </td>
            </tr>
        {% else %}
            <tr>
                <td colspan="8">no records found</td>
            </tr>
        {% endfor %}
        </tbody>
    </table>

</section>

{% endblock %}


```

### ANNONCE DELETE DANS L'ESPACE MEMBRE

    AJOUTER UNE ROUTE POUR LE DELETE 
    ET ENSUITE CREER LE FORMULAIRE POUR AJOUTER LE BOUTON DELETE SUR CHAQUE LIGNE

```php


    /**
     * @Route("/{id}", name="annonce_delete_member", methods={"DELETE"})
     */
    public function delete(Request $request, Annonce $annonce): Response
    {

        if ($this->isCsrfTokenValid('delete'.$annonce->getId(), $request->request->get('_token'))) {

            // COMPLETER LES VERIFICATIONS
            // METHODE GETTER DU CONTROLLER POUR RECUPERER LE USER CONNECTE
            $userConnecte   = $this->getUser();                   
            $auteurAnnonce  = $annonce->getUser();

            // VERIFIER QUE L'ANNONCE APPARTIENT A L'UTILISATEUR CONNECTE
            if (($userConnecte != null) && ($auteurAnnonce != null) &&
                    ($userConnecte->getId() == $auteurAnnonce->getId()) )
            {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->remove($annonce);
                $entityManager->flush();    
            }
        }

        // ON REVIENT SUR L'ESPACE MEMBRE
        return $this->redirectToRoute('member');
    }


```


```twig

        <tbody>
        {% for annonce in annonces %}
            <tr>
                <td>{{ annonce.id }}</td>
                <td>{{ annonce.titre }}</td>
                <td>{{ annonce.url }}</td>
                <td>{{ annonce.description }}</td>
                <td>{{ annonce.photo }}</td>
                <td>{{ annonce.categorie }}</td>
                <td>{{ annonce.datePublication ? annonce.datePublication|date('Y-m-d H:i:s') : '' }}</td>
                <td>
                    <form method="post" action="{{ path('annonce_delete_member', {'id': annonce.id}) }}" onsubmit="return confirm('Are you sure you want to delete this item?');">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token('delete' ~ annonce.id) }}">
                        <button class="btn">Delete</button>
                    </form>
                </td>
            </tr>
        {% else %}
            <tr>
                <td colspan="8">no records found</td>
            </tr>
        {% endfor %}
        </tbody>

```


## ANNONCE: UPDATE DANS L'ESPACE MEMBRE

    AJOUTER UNE NOUVELLE ROUTE DANS MemberController POUR UPDATE

```php

    /**
     * @Route("/{id}/edit", name="annonce_edit_member", methods={"GET","POST"})
     */
    public function edit(Request $request, Annonce $annonce): Response
    {
        $form = $this->createForm(AnnonceMemberType::class, $annonce);
        $form->handleRequest($request);

        // COMPLETER LES VERIFICATIONS
        // METHODE GETTER DU CONTROLLER POUR RECUPERER LE USER CONNECTE
        $userConnecte   = $this->getUser();                   
        $auteurAnnonce  = $annonce->getUser();
        // VERIFIER QUE L'ANNONCE APPARTIENT A L'UTILISATEUR CONNECTE
        if (($userConnecte != null) && ($auteurAnnonce != null) &&
                ($userConnecte->getId() == $auteurAnnonce->getId()) )
        {
            if ($form->isSubmitted() && $form->isValid()) {
                // ENREGISTRER LES MODIFS DANS LA DATABASE
                $this->getDoctrine()->getManager()->flush();
    
                return $this->redirectToRoute('member');
            }
    
        }

        return $this->render('annonce/edit.html.twig', [
            'annonce'   => $annonce,
            'form'      => $form->createView(),
        ]);
    }

```

    ET AJOUTER UN LIEN VERS LA PAGE D'UPDATE POUR CHAQUE LIGNE


```twig

        <tbody>
        {% for annonce in annonces %}
            <tr>
                <td>{{ annonce.id }}</td>
                <td>{{ annonce.titre }}</td>
                <td>{{ annonce.url }}</td>
                <td>{{ annonce.description }}</td>
                <td>{{ annonce.photo }}</td>
                <td>{{ annonce.categorie }}</td>
                <td>{{ annonce.datePublication ? annonce.datePublication|date('Y-m-d H:i:s') : '' }}</td>
                <td>
                    <a href="{{ path('annonce_edit_member', {'id': annonce.id}) }}">edit</a>
                </td>
                <td>
                    <form method="post" action="{{ path('annonce_delete_member', {'id': annonce.id}) }}" onsubmit="return confirm('Are you sure you want to delete this item?');">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token('delete' ~ annonce.id) }}">
                        <button class="btn">Delete</button>
                    </form>
                </td>
            </tr>
        {% else %}
            <tr>
                <td colspan="8">no records found</td>
            </tr>
        {% endfor %}
        </tbody>


```

    AUTONOMIE JUSQU'A 12H10 POUR REVOIR LA PARTIE ESPACE MEMBRE
    ET AUSSI FAIRE CHECKPOINT POUR VOS PROJETS EN EQUIPE...

    NE PAS HESITER A POSER DES QUESTIONS...


## UPLOAD DE FICHIER AVEC SYMFONY

    DOCUMENTATION
    https://symfony.com/doc/current/controller/upload_file.html

    PAUSE DEJEUNER ET REPRISE A 13H50...

## ACTIVITES POUR CET APRES-MIDI

    * CORRIGE EXAM INTER
    * REVISION EXAM FINAL
    * AVANCER ENSEMBLE SUR LE PROJET SYMFONY
    * AVANCER EN EQUIPE SUR VOTRE PROJET
    * ??

## REVISION

    TOUT CODER EN POO...

    JOINTURES
    * ONE TO MANY   => 2 TABLES
    * MANY TO MANY  => 3 TABLES (DONT TABLE TECHNIQUE DE JOINTURE)

### EXO 1: CREER LA DATABASE

    DATABASE SQL revision_finale    CHARSET utf8mb4_general_ci
    * TABLE SQL user
        id                  INT                 => CLE PRIMAIRE
        pseudo              VARCHAR(160)
        email               VARCHAR(160)
        dateInscription     DATETIME

    * TABLE SQL annonce
        id                  INT             => CLE PRIMAIRE
        user_id             INT             => CLE ETRANGERE VERS TABLE user
        titre               VARCHAR(160)
        description         TEXT
        datePublication     DATETIME

    => CREER LA DATABASE ET LES 2 TABLES SQL
    => IL FAUT AJOUTER UNE PAGE CRUD POUR CHAQUE TABLE

### EXO 2: CREER LES PAGES CRUD 

    PARTIE ADMIN
        * 2 PAGES CRUD
                admin-user.php      => CRUD SUR user
                admin-annonce.php   => CRUD SUR annonce


    NE PAS OUBLIER DE PARAMETRER LE FICHIER .htaccess
    => METTRE A JOUR LE NOM DU DOSSIER

```

# SI DANS MON NAVIGATEUR
# http://localhost:8888/formation/revision-finale/
# NOUS DANS NOTRE CAS, ON A DES SOUS-DOSSIERS
# SEULE LIGNE A MODIFIER POUR NOUS ;-p
RewriteBase /formation/revision-finale/


```

    CREER LES PAGES ADMIN POUR user ET annonce
    => EN AUTONOMIE
    => CREER QUELQUES UTILISATEURS
            ET ENSUITE CREER QUELQUES ANNONCES ATTRIBUEES AUX UTILISATEURS

    => ET ENSUITE CREER LA PAGE D'ACCUEIL AVEC LES JOINTURES

    (NOTE: ECHANGE ENTRE MOI ET NICO CE VENDREDI... MOI VENDREDI ET NICOLAS MARDI 19...)
        
### EXO 3: AFFICHAGE AVEC JOINTURE

    PARTIE PUBLIQE
        *   accueil => AFFICHER LES ANNONCES ET AUSSI LE PSEUDO DE L'AUTEUR DE L'ANNONCE
                    => JOINTURE SQL ENTRE annonce ET user

    TABLE SQL 
        categorie
            id
            label
    
    RELATION MANY TO MANY ENTRE annonce ET categorie
    * UNE ANNONCE PEUT ETRE CLASSEE DANS PLUSIEURS CATEGORIES
    * UNE CATEGORIE PEUT CONTENIR PLUSIEURS ANNONCES
    => MANY TO MANY
    => AJOUTER UNE TABLE TECHNIQUE

    TABLE SQL
        annonce_categorie
            id                  => CLE PRIMAIRE
            annonce_id          => CLE ETRANGERE VERS annonce
            categorie_id        => CLE ETRANGERE VERS categorie


    PARTIE ADMIN
        * 2 PAGES CRUD
                categorie
                annonce_categorie

    PARTIE PUBLIQE
        *   categorie => AFFICHER LES ANNONCES DANS LA CATEGORIE voiture
                => JOINTURE SQL ENTRE annonce ET categorie



    PAUSE ET REPRISE A 16H05






























