<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet One Page</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <header>
        <img class="header__img" src="./assets/img/logo.jpg" alt="logo">
        <nav>
            <a href="#section1">section1</a>
            <a href="#section2">section2</a>
            <a href="#section3">section3</a>
        </nav>
    </header>
    <main>
        <h1>titre de page <?php echo date("H:i:s") ?></h1>
        <h1>sans balise echo date("H:i:s") </h1>
        <section id="section1">
            <h2>titre section1</h2>
            <article>
                <h3>titre article</h3>
                <img src="./assets/img/article1.jpg" alt="article1">
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sit dicta quod ut quidem? Maxime earum omnis error esse reprehenderit fugit nesciunt assumenda quod laboriosam nostrum a quibusdam provident, pariatur beatae.
                </p>
            </article>
        </section>
        <section id="section2">
            <h2>titre section2</h2>
            <article>
                <h3>titre article2</h3>
                <img src="./assets/img/article2.jpg" alt="article2">
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sit dicta quod ut quidem? Maxime earum omnis error esse reprehenderit fugit nesciunt assumenda quod laboriosam nostrum a quibusdam provident, pariatur beatae.
                </p>
            </article>
        </section>
        <section id="section3">
            <h2>titre section3</h2>
            <article>
                <h3>titre article3</h3>
                <img src="./assets/img/article3.jpg" alt="article3">
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sit dicta quod ut quidem? Maxime earum omnis error esse reprehenderit fugit nesciunt assumenda quod laboriosam nostrum a quibusdam provident, pariatur beatae.
                </p>
            </article>
        </section>
    </main>
    <footer>
        <p>droits droits réservés</p>
    </footer>

    <script src="./assets/js/script.js"></script>
</body>
</html>