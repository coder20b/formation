<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section>
        <h3>FORMULAIRE UPLOAD</h3>
        <!-- https://www.w3schools.com/php/php_file_upload.asp -->
        <form action="" enctype="multipart/form-data" method="POST">
            <label>
                <span>upload image</span>
                <!-- MIMETYPE image/* tous types de fichiers images -->
                <input type="file" name="image" accept="image/*">
            </label>
            <button type="submit">envoyer le formulaire</button>
        </form>
    </section>
    <section>
        <h3>TRAITEMENT DU FORMULAIRE</h3>
<?php
// $_GET $_POST $_REQUEST   POUR LE FORMULAIRES CLASSIQUES
// $_FILES                  POUR UPLOAD DE FICHIER
// DEBUG
echo "<pre>";
print_r($_FILES);
echo "</pre>";

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

?>
    </section>
</body>
</html>