<?php

class ConnexionControleur {
    private $parametre = array();
    private $oModele;
    private $oVue;

    public function __construct($parametre) {
        $this->parametre = $parametre;
        $this->oModele = new ConnexionModele($parametre);
        $this->oVue = new ConnexionVue($parametre);
    }

    public function choixAction() {
        if (isset($this->parametre['action'])) {
            switch ($this->parametre['action']) {
                case 'form_connexion':
                    $this->afficherFormulaireConnexion();
                    break;
                case 'connexion':
                    $this->verifierConnexion();
                    break;
                case 'deconnexion':
                    $this->seDeconnecter();
                    break;
                case 'profil':  // Ajout du case pour l'action profil
                    $this->afficherProfil();
                    break;
                default:
                    $this->afficherFormulaireConnexion();
                    break;
            }
        } else {
            $this->afficherFormulaireConnexion();
        }
    }
    
    private function afficherProfil() {
        if (isset($_SESSION['client'])) {
            $this->oVue->genererAffichageProfil($_SESSION['client']);
        } else {
            header('Location: index.php?gestion=connexion&action=form_connexion');
            exit();
        }
    }
    private function afficherFormulaireConnexion() {
        $this->oVue->genererAffichageConnexion();
    }

    private function verifierConnexion() {
        if (isset($this->parametre['lastName']) && isset($this->parametre['resNo'])) {
            $client = $this->oModele->connexionClient($this->parametre['lastName'], $this->parametre['resNo']);
            if ($client) {
                $_SESSION['client'] = $client;
                header('Location: index.php');
                exit();
            } else {
                // Gérer l'erreur de connexion
                $this->oVue->genererAffichageConnexion("Identifiants incorrects");
            }
        } else {
            $this->oVue->genererAffichageConnexion("Veuillez remplir tous les champs");
        }
    }

    private function seDeconnecter() {
        $this->oModele->deconnexionClient();
        header('Location: index.php');
        exit();
    }
}