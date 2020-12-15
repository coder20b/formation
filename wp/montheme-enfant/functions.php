<?php

// WORDPRESS VA CHARGER LES 2 FICHIERS functions.php

// FONCTION DE CALLBACK QUE WP VA APPELER
function ajouterCss ()
{
    // https://developer.wordpress.org/reference/functions/get_stylesheet_directory_uri/
    // URL JUSQU'AU DOSSIER DU THEME ENFANT
    $stylesheet_dir_uri = get_stylesheet_directory_uri();

    echo 
    <<<x
    <link rel="stylesheet" href="$stylesheet_dir_uri/style.css">

    x;
}

// => HOOKS (CROCHETS)
// => ACCROCHER DU CODE EN PLUS DANS LA MECANIQUE DE WORDPRESS
// COMME UN EVENT LISTENER, WP VA APPELER LA FONCTION ajouterCss AU MOMENT DE wp_head
add_action("wp_head", "ajouterCss");

function ajouterJs ()
{
    // https://developer.wordpress.org/reference/functions/get_stylesheet_directory_uri/
    // URL JUSQU'AU DOSSIER DU THEME ENFANT
    $stylesheet_dir_uri = get_stylesheet_directory_uri();

    echo 
    <<<x
    <script src="$stylesheet_dir_uri/script-enfant.js"></script>

    x;

}
add_action("wp_footer", "ajouterJs");


// ON PEUT AJOUTER UN FILTRE POUR MODIFIER LE CONTENU
function filtrerContenu ($contenuActuel)
{
    // AJOUTER DU CODE AVANT OU APRES
    $contenuFiltre = "(AVANT)($contenuActuel)(APRES)";

    // CHANGER LE CODE ET REMPLACER AVEC AUTRE CHOSE
    $contenuFiltre = str_replace("FUCK", "F***", $contenuFiltre);

    // EXTRAIRE LE DEBUT MAIS CACHER LE RESTE POUR LE RESERVER AUX ABONNES
    $extrait = substr(strip_tags($contenuFiltre), 0, 10);
    $contenuFiltre = $extrait . "(suite réservé aux abonnés...)";

    return $contenuFiltre;
}
// add_filter("the_content", "filtrerContenu");


