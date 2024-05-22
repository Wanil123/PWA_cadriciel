<?php

namespace Models;

use Bases\Model;

class Utilisateur extends Model {
    protected $table = "utilisateurs";


    /**
     * Insère un nouvel utilisateur
     *
     * @param string $prenom
     * @param string $nom
     * @param string $courriel
     * @param string $mdp
     * @param string|null $image
     * 
     * @return bool
     */
    public function inserer(string $prenom, string $nom, string $courriel, string $mdp, ?string $image){
        $sql = "INSERT INTO $this->table (prenom, nom, courriel, mdp, image)
                VALUES (:prenom, :nom, :courriel, :mdp, :image)";

        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
            ":prenom" => $prenom,
            ":nom" => $nom,
            ":courriel" => $courriel,
            ":mdp" => $mdp,
            ":image" => $image
        ]);
    }

    /**
     * Retourne un utilisateur selon un courriel
     *
     * @param string $courriel
     * @return object|false
     */
    public function parCourriel($courriel) {
        // Créer la requête
        $sql = "SELECT * 
                FROM $this->table
                WHERE courriel = :courriel";

        // Préparer la requête
        $requete = $this->pdo()->prepare($sql);

        // Exécuter la requête (associer valeur à placeholder)
        $requete->execute([
            ":courriel" => $courriel
        ]);

        return $requete->fetch();
    }
}