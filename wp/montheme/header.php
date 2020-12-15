<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon theme WP</title>
    <!-- AJOUT DU CSS -->
    <?php wp_head() ?>

    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/style.css">
</head>
<body <?php body_class() ?>>
    <div class="pagebox">
        <header>
            <img class="header__img" src="<?php echo get_template_directory_uri() ?>/assets/img/logo.svg" alt="logo">
            <nav>
                <?php wp_nav_menu([ "theme_location" => "primary"]) ?>
            </nav>
        </header>
        <main>
