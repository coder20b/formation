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
    => PWA: Progressive Web App

    AVANTAGE DE AJAX
    => ON PEUT CHARGER DU CONTENU SUPPLEMENTAIRE SANS DETRUIRE ET RECHARGER TOUTE LA PAGE

    * LE PREMIER CHARGEMENT DE LA PAGE EST PLUS RAPIDE (CAR MOINS DE CONTENU)
    * ET ON NE CHARGE ENSUITE QUE LE CONTENU NECESSAIRE AU VISITEUR (STREAMING DE CONTENU)

    ATTENTION POUR LE SEO:
    GOOGLE N'EST PAS BON AVEC AJAX
    => GOOGLE COMPREND BIEN LE CONTENU HTML CHARGE AU DEBUT DANS LE CODE DE LA PAGE
    => MAIS IL NE COMPREND MAL LE CONTENU AVEC AJAX
    SI ON A DES PAGES OU LE REFERENCEMENT EST IMPORTANT
    => RESTER SUR LA CREATION CLASSIQUE: 
        CREER LA PAGE AVEC LE CONTENU A REFERENCER AU DEPART
    => PRINCIPAL FREIN A LA GENERALISATION DES SITES AVEC TOUT EN AJAX

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



## AJAX ET JSON

        let contenuBrut = await reponseServeur.text();  // await CAR asynchrone

    .text()     => BIEN POUR RECUPERER UN BLOC DE TEXTE
                => MAIS TROP LIMITE POUR RECUPERER PLUSIEURS INFOS

    AVEC JSON ON VA TRANSMETTRE PLUSIEURS INFOS EN MEME TEMPS

```php

// JSON => TEXTE AU FORMAT D'UN CODE JS POUR UN OBJET
// AVEC PHP
// UN TABLEAU ASSOCIATIF EST TRES PROCHE D'UN OBJET JS
$tabAsso = [
    "cle"       => "valeur",
    "date"      => $date,
    "template"  => $codeTemplate,
];

// CONVERSION D'UN TABLEAU ASSOCIATIF EN CODE JSON
// https://www.php.net/manual/fr/function.json-encode.php
$codeJSON = json_encode($tabAsso, JSON_PRETTY_PRINT);

echo $codeJSON;

```

## EXEMPLES D'UTILISATION D'AJAX DANS LES SITES...

    FORMULAIRE DE RECHERCHE AVEC AUTO-COMPLETION
    exemple: site oui.sncf qui propose les gares de départ et d'arrivée

    GOOGLE MAPS
    exemple: on ne charge que le contenu recherché par le visiteur

    CHAT
    exemple: on ne charge que les discussions récentes 
                et si le visiteur demande alors on charge plus d'historique

    SCROLLING INFINI
    exemple: google images, twitter, facebook, instagram, etc...
                on ne charge pas tout le contenu mais seulement quand le visiteur scrolle dans la page

    ...

## FRONT ET BACK AVEC AJAX

    ON STOCKE LES INFOS DANS SQL
    ON A UNE API EN PHP QUI PRODUIT DU CODE JSON
    ON UTILISE AJAX AVEC fetch POUR RECUPERER LE CODE JSON
    ET ON CONSTRUIT LE HTML EN JS

    => SINGLE PAGE APPLICATION
    => PROGRESSIVE APPS
    => ...ANGULAR, REACT, VUE

```js

async function chargerArticles ()
{
    console.log('tu as cliqué');
    // ON VA ENVOYER UNE REQUETE AJAX
    // ON VA RECUPERER LA LISTE DES ARTICLES

    // await ATTEND LA REPONSE DU SERVEUR 
    // ET "BLOQUE" LE CODE JS JUSQU'A AVOIR LA REPONSE
    // LE RESTE DU CODE ATTEND LA REPONSE POUR ETRE EXECUTE => async CAR LA FONCTION DEVIENT ASYNCHRONE
    let reponseServeur = await fetch('api-article.php');    // await CAR fetch EST ASYNCHRONE
    let objetJSON = await reponseServeur.json();        
    console.log(objetJSON);

    // EFFACER LA LISTE DES ARTICLES
    container.innerHTML = '';
    // JE RECONSTRUIS UN ARTICLE PAR OBJET
    for (let element of objetJSON.articles) {
    container.innerHTML += 
    `
        <article>
            <h3>${element.titre}</h3>
            <p>${element.contenu}</p>
        </article>
    `
    }

};

boutonAjax.addEventListener('click', chargerArticles);


```

    PAUSE ET REPRISE A 13H50


## ACTIVITES APRES-MIDI

    * VueJS
    * correction exam
    * projet cms
    * git
    * projets en équipe
    * autres idées ???
    * ...

## VueJS

    https://vuejs.org/
    Première version: début 2014
    Evan You

    Dernière version: 3.0 (Récente Septembre 2020...)

    Framework Front
    => DANS LE TOP 3 DES FRAMEWORKS FRONT
    => React, Angular, Vue


    https://2019.stateofjs.com/overview/

    Google          Angular         TYPESCRIPT  => (Microsoft)
    Independant     Vue             JS MAISON ET DEPUIS VUE3 RE-ECRIT EN TYPESCRIPT (Microsoft)
    Facebook        React           JSX

    Dans le navigateur, le langage officiel est JS
    TypeScript (Microsoft) évolution de JS.
    => PLUS DE FONCTIONNALITES (TYPAGE...)

    LES 3 FRAMEWORKS PASSENT PAR UNE ETAPE DE COMPILATION POUR PRODUIRE DU JS
    * Angular LE PLUS LOURD     (TypeScript)
    * React EST PLUS LEGER      (JSX)
    * Vue EST LE PLUS LEGER     (JS maison)

    NORMALEMENT, ON COMPILE SUR LE SERVEUR... 
    (NodeJS et npm... ENVIRONNEMENT A INSTALLER COTE SERVEUR...)

    React PEUT AUSSI SE COMPILER COTE FRONT (AVEC BABELJS... ASSEZ LOURD...)
    Vue PEUT AUSSI SE COMPILER COTE FRONT (INTEGRE DANS UNE VERSION "global"... ASSEZ LEGER...)

## Vue

    V2
    https://vuejs.org/v2/guide/

    V3
    https://v3.vuejs.org/guide/introduction.html

    DOC PRATIQUE POUR DEMARRER RAPIDEMENT...

    LE PLUS RAPIDE AVEC LE CDN (Comme Jquery...)
    https://v3.vuejs.org/guide/installation.html#vue-devtools


    VUEJS SANS COMPILATEUR      69Ko
    VUE AVEC COMPILATEUR        106Ko
    jQuery                      88Ko

    * HTML:     IL FAUT UNE BALISE QUI SERT DE CONTAINER POUR VUE
    * JS:       CHARGER LA LIBRAIRIE VUE
                ET ENSUITE AJOUTER SON CODE POUR CONNECTER LE HTML, NOTRE CODE JS ET VUE

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vue</title>
</head>
<body>
    <!-- container Vue -->
    <div id="app">
        <p>Counter: {{ counter }}</p>
    </div>

    <!-- charger la librairie Vue -->
    <script src="https://unpkg.com/vue@next"></script>

    <!-- connecter son code js avec le html et Vue -->
    <script>
let config = {
    data() {
        return {
            counter: 0,
        }
    }
}

// CODE QUI CONNECTE NOTRE PAGE A VUE
Vue.createApp(config).mount('#app');    // COMPILATION SE FAIT COTE FRONT EN JS

    </script>
</body>
</html>
```

## EXEMPLES VUE AVEC HTML, CSS ET FORMULAIRES

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vue</title>
</head>
<body>
    <div id="app">

        <!-- HTML -->
        <h1>{{ titre1 }}</h1>
        <button @click="counter--">enlever 1</button>
        <button @click="counter++">ajouter 1</button>
        <p>Counter: {{ counter }}</p>
        <p>Counter x2: {{ 2 * counter }}</p>
        <p>Counter x10: {{ 10 * counter }}</p>
        <p>quantité: <input type="text" v-model="counter"></p>
        <p>quantité: <input type="range" v-model="counter"></p>
        <p>prixUnitaire: <input type="text" v-model="prixUnitaire"></p>
        <h4>Prix Total= {{ counter * prixUnitaire }}</h4>

        <!-- CSS -->
        <input type="color" v-model="fond">
        <p>hauteur: <input type="range" v-model="hauteur"></p>
        <p>largeur %: <input type="range" v-model="largeur"></p>
        <h1 :style="{ 'background-color' : fond, height: hauteur + 'px', width: largeur + '%' }">texte avec couleur de fond</h1>

        <!-- BOUCLES -->
        <div class="container">
            <article v-for="article in articles">
                <h3>{{ article.titre }}</h3>
                <p>{{ article.contenu }}</p>
            </article>
        </div>

        <button @click.prevent="chargerArticles">charger Articles de SQL</button>

        <!-- FORMULAIRES -->
        <form @submit.prevent="ajouterArticle">
            <input type="text" v-model="nouveauTitre">
            <textarea cols="30" rows="10" v-model="nouveauContenu"></textarea>
            <button>ajouter article</button>
        </form>
    </div>

    <script src="https://unpkg.com/vue@next"></script>
    <script>
let config = {
    methods: {
        async chargerArticles ()
        {
            let reponseServeur = await fetch('api-article.php');    // await CAR fetch EST ASYNCHRONE
            let objetJSON = await reponseServeur.json();        
            this.articles = objetJSON.articles;
        },

        ajouterArticle () {
            // JE RECUPERE LES INFOS DU FORMULAIRE
            let nouvelArticle = {
                titre: this.nouveauTitre,
                contenu: this.nouveauContenu
            }
            // JE RAJOUTE UN NOUVEL ARTICLE
            this.articles.push(nouvelArticle);
        }
    },
    data() {
        return {
            counter: 0,
            titre1: "MA PREMIERE APP AVEC VUE",
            prixUnitaire: 20,
            fond: '#ff0000',
            hauteur: '200',
            largeur: '50',
            nouveauTitre: '',
            nouveauContenu: '',
            articles: [
                { titre : 'titre1', contenu: 'contenu1'},
                { titre : 'titre2', contenu: 'contenu2'},
                { titre : 'titre3', contenu: 'contenu3'},
                { titre : 'titre4', contenu: 'contenu4'},
            ]
        }
    }
}

// CODE QUI CONNECTE NOTRE PAGE A VUE
Vue.createApp(config).mount('#app');    // COMPILATION SE FAIT COTE FRONT EN JS

    </script>
</body>
</html>
```


    AUTONOMIE JUSQU'A 15H45 ET ENSUITE PAUSE... 
    PAUSE ET REPRISE A 16H...

    












































