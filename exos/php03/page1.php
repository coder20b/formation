<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <h1>PAGE1</h1>
        <a href="page1.php?nom=test1006">CLIQUEZ ICI POUR ALLER VERS LA PAGE 1</a>
        <hr>
        <h1>PAGE1</h1>
        <a href="page1.php">CLIQUEZ ICI POUR ALLER VERS LA PAGE 1</a>
        <hr>
        <a href="page2.php">CLIQUEZ ICI POUR ALLER VERS LA PAGE 2</a>
        <hr>
        <!-- <form method="POST" action="page1.php"> -->
        <!-- <form method="POST" action=""> --><!-- SI action="" EST VIDE ALORS LE NAVIGATEUR RECHARGE LA MEME PAGE -->
        <form method="POST"><!-- SI action="" EST VIDE ALORS LE NAVIGATEUR RECHARGE LA MEME PAGE -->
            <input type="text" name="nom">
            <input type="password" name="password">
            <input type="text"><!-- ERREUR CLASSIQUE IL MANQUE L'ATTRIBUT name NE SERA PAS ENVOYE AU SERVEUR WEB -->
            <button>CLIQUEZ ICI POUR ALLER VERS LA PAGE 1</button>
        </form>
        <hr>
        <form method="GET" action="page2.php">
            <button>CLIQUEZ ICI POUR ALLER VERS LA PAGE 2</button>
        </form>
    </main>
</body>
</html>