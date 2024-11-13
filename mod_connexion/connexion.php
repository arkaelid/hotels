<?php

class Connexion {
    private $parametre = array();
    private $oControleur;

    public function __construct($parametre) {
        $this->parametre = $parametre;
        $this->oControleur = new ConnexionControleur($parametre);
    }

    public function choixAction() {
        if (isset($this->parametre['action'])) {
            switch ($this->parametre['action']) {
                case 'form_connexion':
                case 'connexion':
                case 'deconnexion':
                case 'profil':
                    $this->oControleur->choixAction();
                    break;
                default:
                    $this->oControleur->choixAction();
                    break;
            }
        } else {
            $this->oControleur->choixAction();
        }
    }
}