
    </main>
    <footer>
        <p>tous droits réservés - &copy;2020</p>
        <nav>
            <a href="admin.php">admin article</a>
            <a href="admin-newsletter.php">admin newsletter</a>
        </nav>
    </footer>

    <script src="./assets/js/script.js"></script>

    <!-- DEBUG -->
    <template id="debugServeur">
<?php Model::afficherDebug() ?>
    </template>
    <script>
        // ASTUCE: SI ON A UNE BALISE HTML AVEC UN id (EN CAMELCASE...)
        // EN JS, ON PEUT UTILISER DIRECTEMENT UNE VARIABLE AVEC COMME CELUI DE id
        console.log(debugServeur.innerHTML);
    </script>
</body>
</html>