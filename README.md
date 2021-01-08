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

    vendredi 08/01
    
https://prod.liveshare.vsengsaas.visualstudio.com/join?9D6017DB8371E76DD1A7F1CC4B97E746B939

## Questions ??

## RESUME DE L'EPISODE PRECEDENT

POO
    HERITAGE
        SYMFONY CREE UNE CLASSE PARENTE OU IL FOURNIT SON CODE
        => LE DEV CREE UNE CLASSE ENFANT QUI HERITE DE LA CLASSE FOURNIE PAR SYMFONY

        class ContactController extends AbstractController

        class ContactType extends AbstractType

        class ContactRepository extends ServiceEntityRepository

        class LoginFormAuthenticator extends AbstractFormLoginAuthenticator implements PasswordAuthenticatedInterface

    CLASSE ABSTRAITE

    INTERFACE

        class User implements UserInterface

        class LoginFormAuthenticator extends AbstractFormLoginAuthenticator implements PasswordAuthenticatedInterface

    TRAITS

        class LoginFormAuthenticator extends AbstractFormLoginAuthenticator implements PasswordAuthenticatedInterface
        {
            use TargetPathTrait;
            
            // ...
        }



## ACTIVITE POUR CE MATIN

    PROJET SYMFONY

    * BLOG  (EN AUTONOMIE ?)
        ENTITE Article
        ADMIN   => make:crud
        PUBLIC  => AFFICHAGE DES ARTICLES 
                => READ

    * ANNONCES (OU RESEAU SOCIAL...)
        ESPACE MEMBRE
        UN MEMBRE DOIT ETRE IDENTIFIE POUR SE CONNECTER A L'ESPACE MEMBRE
        ET ENSUITE IL PEUT CREER DES ANNONCES
        => ENTITE Annonce
            RELATION ONE TO MANY AVEC User
            (...QUI A PUBLIE L'ANNONCE)
        PARTIE PUBLIQUE
        => AFFICHE LA LISTE DES ANNONCES

## SITE D'ANNONCES

    COMMENCER PAR CREER L'ENTITE Annonce
        titre           string
        url             string
        description     text
        photo           string
        categorie       string
        datePublication datetime
        user            => RELATION ONE-TO-MANY AVEC User

    ONE TO MANY
        ENTRE User ET Annonce
    * POUR UN User COMBIEN D'ANNONCES PEUVENT ETRE ASSOCIEES ?
        => MANY
        CAR UN User PEUT CREER PLUSIEURS ANNONCES
    * POUR UNE Annonce COMBIEN DE User PEUVENT ETRE ASSOCIEES ?
        => ONE
        CAR UNE Annonce EST PUBLIEE PAR UN SEUL User

    POUR CREER L'ENTITE, ON PASSE PAR LA LIGNE DE COMMANDE
    
    php bin/console make:entity

    => DANS LA CONSOLE, ON A UNE AIDE POUR CHOISIR LA RELATION ENTRE Annonce ET user


    ENSUITE LANCER LA COMMANDE 

    php bin/console make:crud


    PAUSE ET REPRISE A 11H05

## SYMFONY ET LES CHAMPS DE FORMULAIRE

    * DOCUMENTATION
    https://symfony.com/doc/current/reference/forms/types.html

    ON PEUT PARAMETRER COMMENT SYMFONY CREE LES CHAMPS DE FORMULAIRE

    ENTITY TYPE
    https://symfony.com/doc/current/reference/forms/types/entity.html


    PAUSE DEJEUNER ET REPRISE A 13H45...

## ACTIVITES POUR CET APREM...

    * corrige exam inter php
    * autonomie individuel pour ajouter les annonces dans votre symfony
    * autonomie equipe pour avancer vos projets
    * avancer sur symfony (pour ajouter espace membre)
    * projet cms
    * ...

    CHOIX POUR CET APREM...
    * autonomie individuel pour ajouter les annonces dans votre symfony
        (et essayer de creer un espace membre...)
    * autonomie equipe pour avancer vos projets

    N'HESITEZ PAS A POSER DES QUESTIONS...

## REDIRECTION APRES LOGIN SUIVANT ROLE

    https://symfony.com/doc/current/security.html#b-fetching-the-user-from-a-service

```php

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $providerKey)
    {
        // https://symfony.com/doc/current/security.html#b-fetching-the-user-from-a-service
        $user = $this->security->getUser();

        $routeRedirect = "accueil";
        if (in_array('ROLE_ADMIN', $user->getRoles())) {
            $routeRedirect = "annonce_index";
        }
        // ... AJOUTER ROLES EN PLUS
        
        if ($targetPath = $this->getTargetPath($request->getSession(), $providerKey)) {
            return new RedirectResponse($targetPath);
        }

        // For example : return new RedirectResponse($this->urlGenerator->generate('some_route'));
        // throw new \Exception('TODO: provide a valid redirect inside '.__FILE__);
        // TEMPORAIRE: A MODIFIER...
        return new RedirectResponse($this->urlGenerator->generate($routeRedirect));
    }


```


































