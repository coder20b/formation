
    </main>
    <footer>
        <p>tous droits réservés</p>
        <nav>
            <a href="admin.php">admin</a>
            <a href="mentions-legales.php">mentions légales</a>
            <a href="credits.php">crédits</a>
            <a href="page-speciale.php">page speciale</a>
        </nav>
    </footer>
    
    <script type="debug" id="debugServeur">
<?php Model::afficherDebug() ?>
    </script>
    <script>
        // ASTUCE: SI ON A UNE BALISE HTML AVEC UN id (EN CAMELCASE...)
        // EN JS, ON PEUT UTILISER DIRECTEMENT UNE VARIABLE AVEC COMME CELUI DE id
        console.log(debugServeur.innerHTML);
    </script>

</body>
</html>