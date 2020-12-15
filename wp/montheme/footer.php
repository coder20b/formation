
        </main>
        <footer>
            <p>tous droits réservés</p>
            <nav>
                <?php wp_nav_menu([ "theme_location" => "footer"]) ?>
            </nav>
            <?php afficherCoucou() ?>
        </footer>

    </div><!--/.page-->

    <!-- AJOUT DU JS -->
    <?php wp_footer() ?>

    <script src="<?php echo get_template_directory_uri() ?>/assets/js/script.js"></script>
</body>
</html>