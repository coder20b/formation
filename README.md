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

    vendredi 04/12

https://prod.liveshare.vsengsaas.visualstudio.com/join?D25DF801076A6F9E9DD209CB21C5A2481741

## Questions ?

## UPLOAD DE FICHIERS AVEC PHP

    https://www.w3schools.com/php/php_file_upload.asp

    RESTREINDRE LE TYPE DE FICHIERS...
    https://www.w3schools.com/tags/att_input_accept.asp

    https://fr.wikipedia.org/wiki/Type_de_m%C3%A9dias#:~:text=Un%20type%20de%20m%C3%A9dias%20(media,sur%20internet%20en%20deux%20parties.

```html
        <!-- https://www.w3schools.com/php/php_file_upload.asp -->
        <form action="" enctype="multipart/form-data" method="POST">
            <label>
                <span>upload image</span>
                <input type="file" name="image">
            </label>
            <button type="submit">envoyer le formulaire</button>
        </form>

```
## UPLOAD NON SECURISE

```php
<?php

if ($_FILES["image"] ?? false)
{
    /*
    Array
    (
        [image] => Array
            (
                [name] => pexels-photo-316465.jpeg
                [type] => image/jpeg
                [tmp_name] => C:\xampp\tmp\php3DE9.tmp
                [error] => 0
                [size] => 99060
            )

    )
    */
    // https://www.php.net/manual/fr/function.move-uploaded-file.php
    move_uploaded_file(
        $_FILES["image"]["tmp_name"], 
        "assets/upload/".$_FILES["image"]["name"]
    );
}

?>
```

### UPLOAD PLUS SECURISE

```php
if ($_FILES["image"] ?? false)
{
    /*
    Array
    (
        [image] => Array
            (
                [name] => pexels-photo-316465.jpeg
                [type] => image/jpeg
                [tmp_name] => C:\xampp\tmp\php3DE9.tmp
                [error] => 0
                [size] => 99060
            )

    )
    */
    // AVANT D'ACCEPTER LE FICHIER
    // IL FAUT FAIRE PLEIN DE VERIF
    // [error] => 0 SINON FICHIER CORROMPU
    // extension du fichier autorisées jpg, jpeg, png, gif, svg, webp, etc...
    //      (DANGER AVEC .php)
    // taille max
    // filtrer le nom du fichier pour enlever les caractères spéciaux

    $tabUpload = $_FILES["image"];
    extract($tabUpload);
    // => ASTUCE QUI CREE LES VARIABLES $name, $type, $tmp_name, $error, $size
    if ($error == 0)
    {
        // UPLOAD OK
        // extraire l'extension de $name
        // https://www.php.net/manual/fr/function.pathinfo.php
        $tabInfoFichier = pathinfo($name);
        extract($tabInfoFichier);
        // => ASTUCE QUI VA CREER LES VARIABLES $extension ET $filename, ... 
        // https://www.php.net/manual/fr/function.strtolower.php
        $extension = strtolower($extension);    // CONVERTIT EN minuscules
        $listeExtensionOk = [ "jpg", "jpeg", "png", "gif", "webp", "svg" ];
        // https://www.php.net/manual/fr/function.in-array
        if (in_array($extension, $listeExtensionOk)) 
        {
            // EXTENSION OK
            $tailleMax = 1024 * 1024 * 10;  // 10 Mo
            // => CONFIG php.ini A EFFECTUER POUR PARAMETRER LA TAILLE MAX UPLOAD
            if ($size <= $tailleMax)
            {
                // TAILLE OK
                $filename = strtolower(preg_replace("/[^a-zA-Z0-9-]/", "", $filename)); // A COMPLETER
                $cheminFinal = "assets/upload/$filename.$extension"; 
                // https://www.php.net/manual/fr/function.move-uploaded-file.php
                move_uploaded_file(
                    $tmp_name, 
                    $cheminFinal
                );

            }
            else
            {
                // TAILLE KO
                echo "ERREUR: FICHIER TROP VOLUMINEUX";
            }
        }
        else
        {
            // EXTENSION KO
            echo "ERREUR: EXTENSION INTERDITE";
        }
    }
    else
    {
        // UPLOAD KO
        // DIFFICILE A TESTER...
        echo "ERREUR: UPLOAD CORROMPU";
    }


    // POUR LES IMAGES
    // OPTIMISATION: PEUT ETRE CREER DES MINIATURES ???
    // PHP PEUT CREER DES IMAGES...
}

```


    PAUSE ET REPRISE A 11H15...

## CONFIG php.ini POUR UPLOAD

    OUVRIR LE FICHIER php.ini DE SON SERVEUR WEB...
    ET CHERCHER LES LIGNES SUIVANTES

```
; Maximum size of POST data that PHP will accept.
; Its value may be 0 to disable the limit. It is ignored if POST data reading
; is disabled through enable_post_data_reading.
; http://php.net/post-max-size
post_max_size=100M

; Maximum allowed size for uploaded files.
; http://php.net/upload-max-filesize
upload_max_filesize=100M

```

    UNE FOIS LES MODIFS EFFECTUEES
    ENREGISTRER LE FICHIER php.ini
    ET REDEMARRER LE SERVEUR WEB

## ACTIVITES

    AUTONOMIE POUR INTEGRER UPLOAD DANS PROJET BLOG
    => 12H45

    PAUSE DEJEUNER A 12H45 ET REPRISE A 13H45

    CREATION DE MINIATURES APRES UPLOAD IMAGE...

    * N'HESITEZ PAS A POSER DES QUESTIONS

## CREATION DE MINIATURE EN PHP

    PHP PROPOSE PLEIN DE FONCTIONS POUR MANIPULER DES IMAGES
    
```php
<?php

function creerMini ($fichierSource, $fichierCible, $largeurCible)
{
    $imageSource = imagecreatefromjpeg($fichierSource);

    if ($imageSource !== false)
    {
        // OK ON A UNE IMAGE CHARGEE
        // ON VA EXTRAIRE LA LARGEUR ET LA HAUTEUR DE L'IMAGE SOURCE
        // https://www.php.net/manual/fr/function.imagesx.php
        // https://www.php.net/manual/fr/function.imagesy.php
        $largeurSource = imagesx($imageSource);     // exemple: 1000
        $hauteurSource = imagesy($imageSource);     // exemple: 2000
    
        $hauteurCible = $hauteurSource * $largeurCible / $largeurSource ; // exemple: 2000 * 300 / 1000 = 600
    
        // https://www.php.net/manual/fr/function.imagecreatetruecolor.php
        $imageCible = imagecreatetruecolor($largeurCible, $hauteurCible);   // image vide
    
        // https://www.php.net/manual/en/function.imagecopyresampled
        imagecopyresampled(
            $imageCible, $imageSource,
            0, 0,
            0, 0,
            $largeurCible, $hauteurCible,
            $largeurSource, $hauteurSource
        );
        // https://www.php.net/manual/en/function.imagejpeg.php
        imagejpeg($imageCible, $fichierCible);
    }
    else
    {
        // KO LE FICHIER N'EST PAS UNE IMAGE JPEG
    }
}

creerMini("assets/upload/photo3.jpg", "assets/mini/photo3.jpg", 160);

?>
```






