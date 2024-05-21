<?php

/**
 * Routes disponibles dans le projet
 * 
 * Format: url => [Controller, méthode]
 */
$routes = [
    "index" => ["UtilisateurController", "connecter"],
    "compte-creer" => ["UtilisateurController", "create"],
    "compte-enregistrer" => ["UtilisateurController", "store"],
];
