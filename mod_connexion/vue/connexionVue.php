<?php

class ConnexionVue {
    private $parametre = array();
    private $tpl;

    public function __construct($parametre) {
        $this->parametre = $parametre;
        $this->tpl = new Smarty();
        
        // Configurer les chemins des templates
        $this->tpl->template_dir = array(
            'templates/',       // Dossier principal des templates
            './'               // Dossier courant
        );
        $this->tpl->compile_dir = 'templates_c/';
    }

    private function chargementValeurs() {
        $this->tpl->assign('login', 'Ici le nom de la personne identifiée');
        $this->tpl->assign('titreVue', 'Connexion');
    }

    public function genererAffichageConnexion($erreur = null) {
        // Charger les valeurs communes
        $this->chargementValeurs();
        
        // Assigner les variables spécifiques
        if ($erreur) {
            $this->tpl->assign('erreur', $erreur);
        }

        // Afficher le template
        $this->tpl->display('mod_connexion/vue/connexionVue.tpl');
    }

    public function genererMenu() {
        if (isset($_SESSION['client'])) {
            return '<div class="user-menu">
                        <a href="index.php?gestion=connexion&action=deconnexion" class="nav-link">
                            <i class="fa fa-power-off"></i> Déconnexion
                        </a>
                    </div>';
        } else {
            return '<div class="user-menu">
                        <a href="index.php?gestion=connexion&action=form_connexion" class="nav-link">
                            <i class="fa fa-user"></i> Connexion
                        </a>
                    </div>';
        }
    }
    public function genererAffichageProfil($client) {
        // Charger les valeurs communes
        $this->chargementValeurs();
        
        // Assigner les données du client
        $this->tpl->assign('client', $client);
        
        // Afficher le template
        $this->tpl->display('mod_connexion/vue/profil.tpl');
    }
}