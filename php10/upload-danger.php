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

// MODE BISOUNOURS
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
    </section>
</body>
</html>