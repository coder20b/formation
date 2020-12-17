
<?php
// $_COOKIE (ET AUSSI SOUVENT DANS $_REQUEST)
// print_r($_COOKIE);

$pseudo = $_COOKIE["pseudo"] ?? "";
$niveau = $_COOKIE["niveau"] ?? 0;

// BLOCAGE SI LE NIVEAU EST INSUFFISANT
if ($niveau < 1)
{
    header("Location: login.php");
}
?>    
<section>
    <h1>ESPACE MEMBRE - bienvenue <?php echo "$pseudo (niveau: $niveau)" ?></h1>
    <h3>en cours de construction... merci de votre patience...</h3>
</section>