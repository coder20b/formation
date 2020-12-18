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

    vendredi 18/12

https://prod.liveshare.vsengsaas.visualstudio.com/join?AD46DC2ED00346F7226A72FE908805154B29

## Questions ??

## RESUME EPISODE PRECEDENT

    POO
    Classe
        METHODES D'OBJET
        PROPRIETES D'OBJET
            (GETTERS ET SETTERS     => FAUSSE BONNE IDEE...)
        VISIBILITE      
            public              UTILISABLE DANS LA CLASSE ET EN DEHORS DE LA CLASSE
            protected           UTILISABLE DANS LA CLASSE ET DANS LES CLASSES ENFANTS
            private             UTILISABLE SEULEMENT DANS LA CLASSE
        HERITAGE
            CLasse Parent
            Classes Enfants
                    LES OBJETS ENFANTS HERITENT DES PROPRIETES ET METHODES DE CLASSE PARENTE
                    => COMME SI LE CODE DE LA CLASSE PARENTE ETAIT DANS LA CLASSE ENFANT
                    EN PRATIQUE: PERMET DE CENTRALISER DU CODE POUR EVITER LES DUPLICATIONS (DRY)

    CONSEIL: METHODOLOGIE
        PARTIR DU PLUS GRAND ET ENSUITE PROGRESSIVEMENT ALLER DANS LES DETAILS
        (DANS LE MONDE DE LA 3D... LOD Level Of Details...)
        COMPOSITION
            TOUS LES PRODUITS ACHETES SONT CONSTRUITS PAR COMPOSITION
            ex: SMARTPHONE  COMPOSE D'UN ECRAN, D'UNE BATTERIE, D'UN PROCESSEUR

## POUR CE MATIN

    * PHP:  CONTINUER SUR LE COURS POO
    * JS:   AJAX
    * SQL:  RELATION ENTRE TABLES
    * git:  BASES DE GIT

    * correction exam: cet après-midi ou mardi après-midi ?

## JS et AJAX

Asynchronous
Javascript
And
Xml

HISTORIQUEMENT TECHNO MICROSOFT DANS IE ET REPRIS DANS LES AUTRES NAVIGATEURS
=> COMBINAISON ENTRE JS ET XML (PASSE DE MODE...)
=> MAINTENANT ON COMBINE JS ET JSON

JavaScript Object Notation
=> COMMENT ON CODE UN OBJET EN JS

```js
// EN JS PRESQUE TOUT CE QU'ON MANIPULE EST UN OBJET
// => DE BASE JS EST UN LANGAGE ORIENTE OBJET

let monObjet = {};  // OBJET VIDE

let user = 
{
    "nom": "Clooney",
    "datePermis" : 1970
}

```

    EN JS ON A DES OUTILS D'IMPORT ET D'EXPORT D'OBJETS JS EN TEXTE (CODE JS...)
    => JSON

    ONE PAGE EST PLUS PERFORMANT QUE DE NAVIGUER EN CHANGEANT DE PAGE
    => SPA: Single Page Application
    => MAIS SI ON A BEAUCOUP DE CONTENUS, 
        CA DEVIENT TROP LOURD CAR ON CHARGE DU CODE QUI NE SERA SUREMENT UTILISE PAR LE VISITEUR


    AVANTAGE DE AJAX
    => ON PEUT CHARGER DU CONTENU SUPPLEMENTAIRE SANS DETRUIRE ET RECHARGER TOUTE LA PAGE

    * LE PREMIER CHARGEMENT DE LA PAGE EST PLUS RAPIDE (CAR MOINS DE CONTENU)
    * ET ON NE CHARGE ENSUITE QUE LE CONTENU NECESSAIRE AU VISITEUR (STREAMING DE CONTENU)


```js

// QUAND ON CLIQUE SUR LE LIEN DE NAVIGATION
// ALORS ON VA REMPLACER LE CONTENU DE LA BALISE main
// PAR LE CONTENU DU TEMPLATE

// async CAR ON UTILISE fetch AVEC await
async function chargerSection (event)
{
        // BLOQUER LE LIEN
        event.preventDefault();
        let template = event.target.getAttribute('data-template');
        console.log(template);

        console.log('on veut charger le contenu de ' + template);

        // ON VA LANCER UNE REQUETE AJAX VERS api.php POUR CHARGER LE CONTENU DU TEMPLATE
        // AVANTAGE: SANS RECHARGER LA PAGE
        let reponseServeur = await fetch('api.php?template=' + template);    // await CAR fetch EST ASYNCHRONE
        // console.log(reponseServeur);
        let contenuBrut = await reponseServeur.text();  // await CAR asynchrone

        containerMain.innerHTML = contenuBrut;

        // let codeSection = document.querySelector(template).innerHTML;
        // console.log(codeSection);
        // containerMain.innerHTML = codeSection;
}

let listLien = document.querySelectorAll("nav a");
for (let lien of listLien)
{
    console.log(lien);
    lien.addEventListener('click', chargerSection);
}   

// ON VA CHARGER AUTOMATIQUEMENT LA PREMIERE SECTION
// ON SIMULE UN CLICK DU VISITEUR
document.querySelector('nav a').click();


```

    PAUSE ET REPRISE A 11H15...

    













































