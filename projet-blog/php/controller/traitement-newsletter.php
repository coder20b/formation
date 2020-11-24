<?php
// 2 SCENARIOS
// SCENARIO 1: LE VISITEUR VIENT D'ARRIVER
// SCENARIO 2: LE VISITEUR VIENT DE REMPLIR LE FORMULAIRE
if (count($_POST) == 0)
{
    // SCENARIO 1
    echo "<p>merci de remplir le formulaire.</p>";
}
else
{
    // SCENARIO 2
    echo "<p>nous vous envoyons un mail de newsletter rapidement.</p>";
    // AJOUTER LE CODE POUR ENREGISTRER LES INFOS
    // => ENREGISTRER LES INFOS DANS UN FICHIER newsletter.txt

    // RECUPERER LES INFOS
    // <input name="email">
    $email  = $_POST["email"];
    // <input name="nom">
    $nom    = $_POST["nom"];

    // COMPLETER LES INFOS
    // https://www.php.net/manual/fr/function.date.php
    $date = date("Y-m-d H:i:s");    // 2020-11-24 14:34:12

    $message =
    <<<x
    nom: $nom
    email: $email
    date: $date
    --------

    x;

    file_put_contents("php/model/newsletter.txt", $message, FILE_APPEND);

    $headers =  'From: contact@monsite.fr' . "\r\n" .
    'Reply-To: no-reply@monsite.fr' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    @mail("test@applh.com", "nouveau inscrit", $message, $headers);

}

?>