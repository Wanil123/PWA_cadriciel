<?php include("views/components/head.php") ?>

<main class="accueil">
    <div>
        <div>
            <h1 class="logo">Faces</h1>
            <section class="login">
                <form action="compte-connecter" method="POST">
                    <input type="text" name="courriel" placeholder="Courriel" autofocus>
                    <input type="password" name="mdp" placeholder="Mot de passe">
                    <input type="submit" value="Se connecter" class="btn submit">
                </form>
                <a href="compte-creer">Pas de compte?</a>
            </section>
        </div>
    </div>
</main>

<?php include("views/components/foot.php") ?>