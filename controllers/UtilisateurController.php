<?php

namespace Controllers;

use Bases\Controller;
use Models\Utilisateur;
use Utils\Upload;

class UtilisateurController extends Controller {
    /**
     * Affiche la page d'accueil (connexion)
     */
    public function index() {
        $this->vue("index");
    }

    /**
     * Affiche le formulaire de création de compte
     */
    public function create() {
        $this->vue("utilisateurs/create");
    }

    /**
     * Traite la création d'un compte
     */
    public function store() {
        // Paramètres présents
        if(empty($_POST["prenom"]) ||
           empty($_POST["nom"]) || 
           empty($_POST["courriel"]) ||
           empty($_POST["mdp"]) ||
           empty($_POST["confirmer_mdp"])){
            $this->rediriger("compte-creer?infos_requises");
        }

        // Mot de passe est confirmé
        if($_POST["mdp"] != $_POST["confirmer_mdp"]){
            $this->rediriger("compte-creer?mdp_incorrect");
        }

        // Traitement de l'image
        $image = null;
        if(!empty($_FILES["image"])){
            $upload = new Upload("image");
            $image = $upload->placerDans("uploads");
        }

        // Sauvegarde des informations du compte
        $modele_utilisateur = new Utilisateur;
        $succes = $modele_utilisateur->inserer(
                            $_POST["prenom"], 
                            $_POST["nom"], 
                            $_POST["courriel"],
                            password_hash($_POST["mdp"], PASSWORD_DEFAULT),
                            $image
                        );
                        
        if(!$succes){
            $this->rediriger("compte-creer?echec_creation_compte");
        }

        $this->rediriger("index?succes_creation_compte");
    }

    /**
     * Traite la connexion de l'utilisateur
     */
    public function connecter() {
        if(empty($_POST["courriel"]) || empty($_POST["mdp"])){
            $this->rediriger("index?infos_requises");
        }

        $modele_utilisateur = new Utilisateur;
        $utilisateurs = $modele_utilisateur->parCourriel($_POST["courriel"]);

        // Validation de l'utilisateur et de son mot de passe
        if( ! $utilisateurs || ! password_verify($_POST["mdp"], $utilisateurs->mdp) ){
            $this->rediriger("index?infos_invalides");
        }

        $_SESSION["utilisateur_id"] = $utilisateurs->id;

        $this->rediriger("publications?succes_connexion");
    }
}