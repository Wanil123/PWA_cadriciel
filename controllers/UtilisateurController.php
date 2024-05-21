<?php

namespace Controllers;

use Bases\Controller;
use Utils\Upload;

class UtilisateurController extends Controller {
    /**
     * Affiche la page d'accueil (connexion)
     */
    public function connecter() {
        $this->vue("index");
    }

    /**
     * Affiche le formulaire de création de compte
     */
    public function create() {
        $this->vue("utilisateurs/create");
    }

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

    }
}