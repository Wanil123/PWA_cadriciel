<?php include("views/components/head.php") ?>
<main class="compte">
    <div>
        <div>
            <h1>Créez votre<span>compte</span></h1>
            <section>
                <?php if(isset($_GET["infos_requises"])) : ?>
                    <p class="msg erreur">
                        <span class="material-icons">
                            error
                        </span>
                        Toutes les informations sont requises, sauf la photo
                    </p>
                <?php endif; ?>

                <?php if(isset($_GET["mdp_incorrect"])) : ?>
                    <p class="msg erreur">
                        <span class="material-icons">
                            error
                        </span>
                        Le mot de passe n'a pu être confirmé. Réessayez.
                    </p>
                <?php endif; ?>

                <form action="compte-enregistrer" method="POST" enctype="multipart/form-data">
                    <input 
                        type="text" 
                        name="prenom" 
                        placeholder="Prénom" 
                        autofocus
                    >
                    <input type="text" name="nom" placeholder="Nom">
                    <input type="email" name="courriel" placeholder="Courriel">
                    <input type="password" name="mdp" placeholder="Mot de passe">
                    <input type="password" name="confirmer_mdp" placeholder="Confirmer le mot de passe">
                    <label>
                        Photo:
                        <input type="file" name="image">
                    </label>
                    <input type="submit" value="Créer!" class="btn submit">
                </form>
                <a href="index">Connexion</a>
            </section>
        </div>
    </div>
</main>
<?php include("views/components/foot.php") ?>