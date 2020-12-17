
    </main>
    <footer>
        <p>tous droits réservés</p>
        <nav>
            <a href="inscription.php">inscription</a>
            <a href="login.php">login</a>
            <a href="espace-membre.php">espace-membre</a>
            <a href="admin.php">admin</a>
            <a href="admin-user.php">admin user</a>
        </nav>
        <nav>
            <a href="mentions-legales.php">mentions légales</a>
            <a href="credits.php">crédits</a>
            <a href="page-speciale.php">page speciale</a>
        </nav>
    </footer>
    
    <script id="debugServeur" type="pasdujs">
<?php Model::afficherDebug() ?>        
    </script>
    <script>
        console.log(debugServeur.innerHTML);
    </script>
    
</body>
</html>